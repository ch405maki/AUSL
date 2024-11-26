<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\UserLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        $superAdminRoleId = 3; // Assuming role_id 1 is for Super Admin
        $users = User::where('role_id', '!=', $superAdminRoleId)->get(); // Exclude Super Admin users
        $roles = Role::all(); // Fetch all roles

        UserLog::create([
            'user_id' => Auth::id(),
            'action' => 'Visit User Management',
        ]);

        return Inertia::render('UserManagement/Index', [
            'users' => $users,
            'roles' => $roles, // Pass roles to the view
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role_id' => 'required|integer',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        UserLog::create([
            'user_id' => Auth::id(),
            'action' => 'Created New Account',
        ]);

        return redirect()->route('users')->with('success', 'User created successfully.');
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role_id' => 'required|integer|exists:roles,id',
        ]);

        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('users')->with('success', 'User role updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users');
    }
}