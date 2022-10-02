<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LibrarianController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', User::class);

        $search_array = User::where('role_id', 2)->orderBy('name', 'asc')->get();

        if (request()->get('search')) {
            $librarians = User::where('role_id', 2)
                ->where('name', 'LIKE', '%' . request()->get('search') . '%')
                ->orderBy('name', 'asc')->get();

            return view('librarians.index', compact('librarians', 'search_array'));
        }

        $librarians = User::where('role_id', 2)->orderBy('name', 'asc')->paginate(8);
        $pagination = true;

        return view('librarians.index', compact('librarians', 'search_array', 'pagination'));
    }

    public function create()
    {
        $this->authorize('create', User::class);

        return view('librarians.create');
    }

    public function store(StoreUserRequest $request)
    {
        $this->authorize('create', User::class);

        $inputs = $request->validated();
        $inputs['role_id'] = 2;
        $inputs['password'] = Hash::make($request->password);
        unset($inputs['confirm_password']);

        if ($request['picture']) {
            $file = $request['picture'];
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = "/images/users/" . Str::slug(time() . " " . $filename) . ".{$file->getClientOriginalExtension()}";
            $inputs['picture'] = $filename;
            $file->move(public_path('/images/users/'), $filename);
        }

        User::create($inputs);
        return redirect()->route('librarians.index')->with('flash-success', __('Librarian created successfully!'));
    }

    public function show(User $librarian)
    {
        $this->authorize('view', $librarian);
        if (!$librarian->isLibrarian()) {
            return back();
        }

        $user = $librarian;
        $activities = Activity::where('librarian_id', $librarian->id)->orderBy('id', 'desc')->take(5)->get();

        return view('librarians.show', compact('librarian', 'activities', 'user'));
    }

    public function edit(User $librarian)
    {
        $this->authorize('update', $librarian);
        if (!$librarian->isLibrarian()) {
            return back();
        }

        return view('librarians.edit', compact('librarian'));
    }

    public function update(UpdateUserRequest $request, User $librarian)
    {
        $this->authorize('update', $librarian);
        if (!$librarian->isLibrarian()) {
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

        $librarian->update($inputs);
        return redirect()->route("librarians.show", compact('librarian'))->with('flash-success', __('Librarian updated successfully!'));
    }

    public function destroy(User $librarian)
    {
        $this->authorize('delete', $librarian);
        if (!$librarian->isLibrarian()) {
            return back();
        }

        $librarian->delete();
        return redirect()->route("librarians.index")->with('flash-success', __('Librarian deleted successfully!'));
    }
}
