<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.roles.index', ['roles' => Role::all()]);
    }

    public function show_role($id)
    {
        $role = Role::findOrFail($id);
        return view('pages.dashboard.roles.details', ['role' => $role]);
    }

    public function edit_role($id)
    {
        $role = Role::findOrFail($id);
        return view('pages.dashboard.roles.edit', ['role' => $role]);
    }
}
