<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function customerCreate(Request $request)
    {
        $customer = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => bcrypt($request->password),
            'status' => 'active',
            'role' => 'customer',
        ]);
        return back()->with('success', 'Customer created successfully');
    }

    public function customerList() // Customer List
    {
        $data['customers'] = User::where('role', 'customer')->withCount('rentals')->get();
        return response()->json($data);
    }

    public function customerDetails(User $customer)
    {
        $cars = $customer->load('rentals');
        return response()->json($cars);
    }

    public function customerEdit(User $customer)
    {
        return response()->json($customer);
    }

    public function customerUpdate(Request $request, User $customer)
    {
        $customer->update($request->all());
        return back()->with('success', 'Customer updated successfully');
    }

    public function customerDelete(User $customer)
    {
        $customer->delete();
        return back()->with('success', 'Customer deleted successfully');
    }
}