<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RentalConfirmation;
use App\Mail\AdminRentalNotification;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Auth::user()->rentals()->with('car')->latest()->get();
        return view('frontend.rentals.index', compact('rentals'));
    }

    public function store(Request $request, Car $car)
    {
        $validated = $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Check if car is available for the selected dates
        $isAvailable = !Rental::where('car_id', $car->id)
            ->where(function($query) use ($validated) {
                $query->whereBetween('start_date', [$validated['start_date'], $validated['end_date']])
                      ->orWhereBetween('end_date', [$validated['start_date'], $validated['end_date']])
                      ->orWhere(function($query) use ($validated) {
                          $query->where('start_date', '<=', $validated['start_date'])
                                ->where('end_date', '>=', $validated['end_date']);
                      });
            })
            ->where('status', '!=', 'canceled')
            ->exists();

        if (!$isAvailable) {
            return back()->with('error', 'The car is not available for the selected dates.');
        }

        $days = (strtotime($validated['end_date']) - strtotime($validated['start_date'])) / (60 * 60 * 24);
        $totalCost = $days * $car->daily_rent_price;

        $rental = Rental::create([
            'user_id' => Auth::id(),
            'car_id' => $car->id,
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'total_cost' => $totalCost,
            'status' => 'ongoing',
        ]);

        // Send emails
        Mail::to(Auth::user()->email)->send(new RentalConfirmation($rental));
        Mail::to(env('ADMIN_EMAIL'))->send(new AdminRentalNotification($rental));

        return redirect()->route('frontend.rentals.index')->with('success', 'Car rented successfully!');
    }

    public function cancel(Rental $rental)
    {
        if ($rental->user_id !== Auth::id()) {
            abort(403);
        }

        if (today() >= $rental->start_date) {
            return back()->with('error', 'You can only cancel rentals before the start date.');
        }

        $rental->update(['status' => 'canceled']);
        return back()->with('success', 'Rental canceled successfully.');
    }
}