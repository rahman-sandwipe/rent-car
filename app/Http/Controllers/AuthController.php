<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    } /** login page */
    public function register() {
        return view('auth.register');
    }  /** register page */


    public function loginPost(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);
            $remember = $request->has('remember') ? true : false;
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
                if (Auth::user()->is_admin) {
                    return redirect()->route('admin.dashboard');
                }else{
                    return redirect()->route('dashboard');
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    } /** login method */
    public function registerPost(Request $request) {
        try{
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:5',
            ]);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            return redirect()->route('dashboard');
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    } /** register method */
}
