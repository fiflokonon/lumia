<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.users', ['users' => User::all()]);
    }

    public function role_users($code)
    {
        $role = Role::where('code', $code)->first();
        return view('pages.dashboard.role_users', ['role' => $role, 'users' => $role->users]);
    }

    public function edit_profile($id)
    {
        $user = User::findOrFail($id);
        return view('pages.dashboard.user_edit_profile', ['user' => $user]);
    }

    public function show_user_details($id)
    {
        $user = User::findOrFail($id);
        return view('pages.dashboard.user_details', ['user' => $user]);
    }

    public function show_profile()
    {
        return view('pages.dashboard.user_profile', ['user' => auth()->user()]);
    }
}
