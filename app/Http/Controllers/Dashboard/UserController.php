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
}
