<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AuthController extends Controller
{
    

    public function getLogin()
    {
        return view('admin.auth.login');
    }
    public function postLogin(LoginRequest $request)
    {
        $data = $request->all();
        $email = $data['email'];
        $password = $data['password'];

        // dd($data);
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
         
            return redirect()->route('admin.user.list');
        }
       
        return redirect()->route('auth.getLogin');
        
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.getLogin');
    }
    public function getRegister()
    {
        return view('admin.auth.register');
    }

    // public function postRegister(Request $request)
    // {
    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = bcrypt($request->password);
    //     $user->role = 0;
    //     $user->status = 1;
    //     // dd($user);
    //     $user->save();
    //     return redirect()->route('auth.getLogin');
    // }
    public function postRegister(RegisterRequest $request)
    {
        $request->validate([
            'name' => 'required|min:6|max:32',
            'email' => 'required|min:6|max:32|email',
            'password' => 'required|min:6',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 0;
        $user->status = 1;
        // dd($user);
        $user->save();
        session()->flash('success', 'Bạn đã đăng ký người dùng thành công');
        return redirect()->route('auth.getLogin');
    }
}
