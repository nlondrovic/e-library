<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LibrarianController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', User::class);

        if ($request->get('search')) {
            $search_array = User::where('role_id', 2)->orderBy('name', 'asc')->get();
            $librarians = User::where('role_id', 2)
                ->where('name', 'LIKE', '%' . $request->get('search') . '%')
                ->orderBy('name', 'asc')->get();

            return view('librarians.index', compact('librarians', 'search_array'));
        }

        $librarians = User::where('role_id', 2)->orderBy('name', 'asc')->paginate(8);
        $search_array = User::where('role_id', 2)->orderBy('name', 'asc')->get();
        $pagination = true;

        return view('librarians.index', compact('librarians', 'search_array', 'pagination'));
    }

    public function create()
    {
        $this->authorize('create',User::class);

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
        } else {
            $inputs['picture'] = User::DEFAULT_USER_PICTURE_PATH;
        }

        User::create($inputs);
        return redirect()->route('librarians.index');
    }

    public function show(User $librarian)
    {
        $this->authorize('view', $librarian);

        return view('librarians.show', compact('librarian'));
    }

    public function edit(User $librarian)
    {
        $this->authorize('update', $librarian);

        return view('librarians.edit', compact('librarian'));
    }

    public function update(UpdateUserRequest $request, User $librarian)
    {
        $this->authorize('update', $librarian   );

        $inputs = $request->validated();

        if ($request['picture']) {
            $file = $request['picture'];
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = "/images/users/" . Str::slug(time() . " " . $filename) . ".{$file->getClientOriginalExtension()}";
            $inputs['picture'] = $filename;
            $file->move(public_path('/images/users/'), $filename);
        } else {
            $inputs['picture'] = User::DEFAULT_USER_PICTURE_PATH;
        }

        $librarian->update($inputs);
        return redirect()->route("librarians.show", compact('librarian'));
    }

    public function destroy(User $librarian)
    {
        $this->authorize('delete', User::class);

        $librarian->delete();
        return redirect()->route("librarians.index");
    }
}
