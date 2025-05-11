@extends('frontend.layout')

@section('title', $car->name)

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-7">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ $car->image ? asset('storage/' . $car->image) : 'https://via.placeholder.com/800x500?text=No+Image' }}" class="d-block w-100 rounded" alt="{{ $car->name }}">
                            </div>
                        </div>
                    </div>
                    
                    <h2 class="mt-4">{{ $car->name }}</h2>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">{{ $car->brand }} • {{ $car->model }} • {{ $car->year }}</span>
                        <span class="badge bg-{{ $car->availability ? 'success' : 'danger' }}">
                            {{ $car->availability ? 'Available' : 'Not Available' }}
                        </span>
                    </div>
                    
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Car Type</span>
                            <span>{{ ucfirst($car->car_type) }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Daily Rent Price</span>
                            <span class="price-highlight">${{ number_format($car->daily_rent_price, 2) }}</span>
                        </li>
                    </ul>
                    
                    <h5>Description</h5>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-5">
            @if($car->availability)
                <div class="rental-form">
                    <h4 class="mb-4">Rent This Car</h4>
                    
                    @auth
                        <form action="{{ route('frontend.rentals.store', $car->id) }}" method="POST">
                            @csrf
                            <input type="hidden" id="daily_price" value="{{ $car->daily_rent_price }}">
                            
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" required>
                            </div>
                            
                            <div class="mb-3 p-3 bg-light rounded">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Daily Price:</span>
                                    <span>${{ number_format($car->daily_rent_price, 2) }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Rental Days:</span>
                                    <span id="total_days">0</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between fw-bold">
                                    <span>Total Cost:</span>
                                    <span id="total_price">$0.00</span>
                                </div>
                                <input type="hidden" name="total_cost" id="total_cost_input">
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100 py-2">Rent Now</button>
                        </form>
                    @else
                        <div class="alert alert-info">
                            <p>You need to <a href="{{ route('login') }}" class="alert-link">login</a> to rent this car.</p>
                            <p>Don't have an account? <a href="{{ route('register') }}" class="alert-link">Register here</a>.</p>
                        </div>
                    @endauth
                </div>
            @else
                <div class="alert alert-warning">
                    <h5 class="alert-heading">Not Available</h5>
                    <p>This car is currently not available for rent. Please check back later or browse our other available cars.</p>
                    <a href="{{ route('frontend.cars.index') }}" class="btn btn-outline-primary">Browse Available Cars</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection