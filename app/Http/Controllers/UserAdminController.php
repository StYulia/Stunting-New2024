<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAdminController extends Controller
{
    //
    public function index()
    {
        $users = User::whereIn('role', ['admin', 'kader'])->paginate(10);
        return view("admin.users.index", compact("users"));
    }

    public function create()
    {
        return view("admin.users.create");
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'fullname' => 'required|string|max:255',
            'alamat' => 'required|string',
            'role' => 'required|string|in:admin,kader'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'fullname' => $request->fullname,
            'alamat' => $request->alamat,
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        return view("admin.users.edit", compact("user"));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'fullname' => 'required|string|max:255',
            'alamat' => 'required|string',
            'role' => 'required|string|in:admin,kader'
        ]);

        $data = $request->only(['name', 'email', 'fullname', 'alamat', 'role']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

}
