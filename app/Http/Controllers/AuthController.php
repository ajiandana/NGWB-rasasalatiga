<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }

    public function getUsers()
    {
        $user = User::all();
        return $user;
        // return view('login');
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string',
        ]);
        
        $user = User::where('email', $request->email)->first();
        
        if($user && Hash::check($request->password, $user->password)) 
        {
            Auth::login($user);

            switch($user->role) {
                case 'superadmin':
                    return redirect()->route('superadmin.dashboard');
                case 'adminresto':
                    return redirect()->route('admin-resto.dashboard.index');
                default:
                    return redirect()->route('login')->with('error', 'gagal login!');
            }
        }
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'logout berhasil');
    }
}
