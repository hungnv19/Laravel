<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::select('*')->paginate(10);;
        return view('admin.user.list', [
            'user_list' => $user
        ]);
    }
    public function delete(User $user) {
        if($user->delete()) {
            return redirect()->back();
        }
    }
    public function status(User $user)
    {
        if ($user->status == 1) {
            $user->status = 0;
        } else {
            $user->status =  1;
        }
        $user->save();
        return back();
    }
}
