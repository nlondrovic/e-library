<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', User::class);

        $admins = User::where('role_id', 1)->orderBy('name', 'asc')->paginate(8);
        return view('admins.index', compact('admins'));
    }

    public function create()
    {
        $this->authorize('create', User::class);

        return view('admins.create');
    }

    public function store(StoreUserRequest $request)
    {
        $this->authorize('create', User::class);

        $inputs = $request->validated();
        $inputs['role_id'] = 1;
        $inputs['password'] = Hash::make($request->password);
        unset($inputs['confirm_password']);

        if ($request['picture']) {
            $file = $request['picture'];
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = "/images/users/" . Str::slug(time() . " " . $filename) . ".{$file->getClientOriginalExtension()}";
            $inputs['picture'] = $filename;
            $file->move(public_path('/images/users/'), $filename);
        } else {
            $inputs['picture'] = User::DEFAULT_USER_PICTURE_PATH;
        }

        User::create($inputs);
        return redirect()->route('admins.index');
    }

    public function show(User $admin)
    {
        $this->authorize('view', $admin);
        if (!$admin->isAdmin()) {
            return back();
        }

        return view('admins.show', compact('admin'));
    }

    public function edit(User $admin)
    {
        $this->authorize('update', $admin);
        if (!$admin->isAdmin()) {
            return back();
        }

        return view('admins.edit', compact('admin'));
    }

    public function update(UpdateUserRequest $request, User $admin)
    {
        $this->authorize('update', $admin);
        if (!$admin->isAdmin()) {
            return back();
        }

        $inputs = $request->validated();

        if ($request['picture']) {
            $file = $request['picture'];
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = "/images/users/" . Str::slug(time() . " " . $filename) . ".{$file->getClientOriginalExtension()}";
            $inputs['picture'] = $filename;
            $file->move(public_path('/images/users/'), $filename);
        }

        $admin->update($inputs);
        return redirect()->route("admins.show", compact('admin'));
    }

    public function destroy(User $admin)
    {
        $this->authorize('delete', auth()->user(), $admin);
        if (!$admin->isAdmin()) {
            return back();
        }

        $admin->delete();
        return redirect()->route("admins.index");
    }
}
