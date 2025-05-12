@extends('frontend.inc.layout')

@section('title', 'Browse Cars')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5>Filters</h5>
                    </div>
                    <div class="card-body">
                        <form id="filter-form">
                            <div class="mb-3">
                                <label class="form-label">Brand</label>
                                <select name="brand" class="form-select">
                                    <option value="">All Brands</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand }}"
                                            {{ request('brand') == $brand ? 'selected' : '' }}>{{ $brand }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Car Type</label>
                                <select name="car_type" class="form-select">
                                    <option value="">All Types</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type }}"
                                            {{ request('car_type') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price Range</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" name="min_price" class="form-control" placeholder="Min"
                                            value="{{ request('min_price') }}">
                                    </div>
                                    <div class="col">
                                        <input type="number" name="max_price" class="form-control" placeholder="Max"
                                            value="{{ request('max_price') }}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @foreach ($cars as $car)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <img src="{{ $car->image ? asset('storage/' . $car->image) : 'https://via.placeholder.com/300x200?text=No+Image' }}"
                                    class="card-img-top" alt="{{ $car->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $car->name }}</h5>
                                    <p class="card-text">
                                        <strong>Brand:</strong> {{ $car->brand }}<br>
                                        <strong>Model:</strong> {{ $car->model }}<br>
                                        <strong>Type:</strong> {{ ucfirst($car->car_type) }}<br>
                                        <strong>Year:</strong> {{ $car->year }}<br>
                                        <strong>Price:</strong> ${{ number_format($car->daily_rent_price, 2) }}/day
                                    </p>
                                </div>
                                <div class="card-footer bg-white">
                                    <a href="{{ route('frontend.cars.show', $car->id) }}"
                                        class="btn btn-primary w-100">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('filter-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const params = new URLSearchParams(formData).toString();
            window.location.href = '{{ route('frontend.cars.index') }}?' + params;
        });
    </script>
@endpush
