@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card stat-card primary">
            <div class="card-body">
                <h5 class="stat-value">{{ $totalCars }}</h5>
                <p class="stat-label">Total Cars</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card success">
            <div class="card-body">
                <h5 class="stat-value">{{ $availableCars }}</h5>
                <p class="stat-label">Available Cars</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card warning">
            <div class="card-body">
                <h5 class="stat-value">{{ $totalRentals }}</h5>
                <p class="stat-label">Total Rentals</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card danger">
            <div class="card-body">
                <h5 class="stat-value">${{ number_format($totalEarnings, 2) }}</h5>
                <p class="stat-label">Total Earnings</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Recent Rentals</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Car</th>
                            <th>Dates</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentRentals as $rental)
                        <tr>
                            <td>{{ $rental->user->name }}</td>
                            <td>{{ $rental->car->name }}</td>
                            <td>{{ $rental->start_date->format('M d') }} - {{ $rental->end_date->format('M d') }}</td>
                            <td>${{ number_format($rental->total_cost, 2) }}</td>
                            <td>
                                <span class="badge bg-{{ 
                                    $rental->status == 'ongoing' ? 'primary' : 
                                    ($rental->status == 'completed' ? 'success' : 'danger') 
                                }}">
                                    {{ ucfirst($rental->status) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">No rentals found</td>
                        </tr>
                        @endforelse                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>Recently Added Cars</h5>
            </div>
            <div class="card-body">
                @forelse($recentCars as $car)
                <div class="d-flex mb-3">
                    @if($car->image)
                    <img src="{{ asset('storage/' . $car->image) }}" width="60" height="60" class="rounded me-3" alt="{{ $car->name }}">
                    @endif
                    <div>
                        <h6>{{ $car->name }}</h6>
                        <small class="text-muted">{{ $car->brand }} - ${{ $car->daily_rent_price }}/day</small>
                    </div>
                </div>
                @empty
                <p class="text-muted">No cars added recently</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection