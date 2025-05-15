<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboardPage() {
        return view('backend.dashboard.index');
    }

    public function carsPage() {
        return view('backend.cars.index');
    }
    
    public function rentalsPage() {
        return view('backend.rentals.index');
    }
    
    public function customersPage() {
        return view('backend.customers.index');
    }
    
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }


    public function adminList()     // Admin List
    {
        $data['admins'] = User::where('role', 'admin')->withCount('rentals')->get();
        return response()->json($data);
    }
}
