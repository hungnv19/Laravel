<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
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
         
            return redirect()->route('users.list');
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
}