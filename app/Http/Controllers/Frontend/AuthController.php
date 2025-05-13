<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // login
    public function login() {
        return view('frontend.auth.login');
    }
    // register
    public function register() {
        return view('frontend.auth.register');
    }


    public function loginPost(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

            $remember = $request->has('remember');

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
                $user = Auth::user();
                
                if ($user->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                } else {
                    return redirect()->route('customer.dashboard');
                }
            } else {
                return redirect()->back()->with('error', 'Invalid email or password');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
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
