<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('role', 'customer')->withCount('rentals')->get();
        return view('admin.customers.index', compact('customers'));
    }

    public function show(User $customer)
    {
        $rentals = $customer->rentals()->with('car')->latest()->get();
        return view('admin.customers.show', compact('customer', 'rentals'));
    }

    public function destroy(User $customer)
    {
        $customer->delete();
        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully');
    }
}