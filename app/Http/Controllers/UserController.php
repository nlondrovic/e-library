<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $students = User::all()->where('role_id', 3);
        return view('master.students.index', ['students' => $students]);
    }

    public function create()
    {
        return view('master.students.create');
    }

    public function store(StoreUserRequest $request)
    {
        User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'JMBG' => $request->jmbg,
            'role_id' => 3,
            'picture' => '/assets/img/user.jpg'
        ]);
        return redirect()->route('student.index');
    }

    public function show($id)
    {
        return view('master.students.show', ['student' => User::find($id)]);
    }

    public function edit($id)
    {
        return view('master.students.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
