<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view('frontend.auth.login');
    }    // login
    public function register() {
        return view('frontend.auth.register');
    }    // register


    public function loginPost(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $msg = 'Login successfully';
                return redirect()->route('dashboard')->with('success', $msg);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }
    
    // registerPost
    public function registerPost(Request $request) {
        try{
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'role' => 'customer'
            ]);

            return redirect()->route('dashboard');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
