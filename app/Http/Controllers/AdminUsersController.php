<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view("admin.users.index",compact("users"));
    }
}
