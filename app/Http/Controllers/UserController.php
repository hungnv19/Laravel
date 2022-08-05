<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('role', 1)->get();
        return view('admin.user.list', [
            'user_list' => $user
        ]);
    }
}
