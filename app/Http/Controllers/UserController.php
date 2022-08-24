<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->get('search')) {
            $search_array = User::where('role_id', 3)->orderBy('name', 'asc')->get();
            $students = User::where('role_id', 3)
                ->where('name', 'LIKE', '%' . $request->get('search') . '%')
                ->orderBy('name', 'asc')->get();

            return view('students.index', compact('students', 'search_array'));
        }

        $students = User::where('role_id', 3)->orderBy('name', 'asc')->paginate(8);
        $search_array = User::where('role_id', 3)->orderBy('name', 'asc')->get();
        $pagination = true;

        return view('students.index', compact('students', 'search_array', 'pagination'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(StoreUserRequest $request)
    {
        $inputs = $request->validated();
        $inputs['role_id'] = 3;
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
        return redirect()->route('students.index');
    }

    public function show(User $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(User $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(UpdateUserRequest $request, User $student)
    {
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

        $student->update($inputs);
        return redirect()->route("students.show", compact('student'));
    }

    public function destroy(User $student)
    {
        $student->delete();
        return redirect()->route("students.index");
    }
}
