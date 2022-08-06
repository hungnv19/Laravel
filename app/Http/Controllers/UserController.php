<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::get();
        return view('admin.user.list', [
            'user_list' => $user
        ]);
    }
    public function delete(User $user) {
        if($user->delete()) {
            return redirect()->back();
        }
    }
}
