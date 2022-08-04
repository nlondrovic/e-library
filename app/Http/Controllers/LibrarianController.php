<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LibrarianController extends Controller
{
    public function index()
    {
        $librarians = User::where('role_id', 2)->get();
        return view('master.librarians.index', compact('librarians'));
    }

    public function create()
    {
        return view('master.librarians.create');
    }

    public function store(StoreUserRequest $request)
    {
        User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'JMBG' => $request->jmbg,
            'role_id' => 2,
            'picture' => '/assets/img/user.jpg'
        ]);
        return redirect()->route('librarians.index');
    }

    public function show(User $librarian)
    {
        return view('master.librarians.show', compact('librarian'));
    }

    public function edit(User $librarian)
    {
        return view('master.librarians.edit', compact('librarian'));
    }

    public function update(UpdateUserRequest $request, User $librarian)
    {
        $inputs = $request->validated();
        $librarian->update($inputs);

        return redirect()->route("librarians.show", compact('librarian'));
    }

    public function destroy(User $librarian)
    {
        $librarian->delete();
        return redirect()->route("librarians.index");
    }
}
