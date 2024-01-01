<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::where('role_id', 1)->get();
        return view('admin.users.index', [
            'users' => $users
        ]);
    }
}
