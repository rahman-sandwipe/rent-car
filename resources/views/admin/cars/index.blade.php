@extends('admin.layout')

@section('title', 'Manage Cars')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Manage Cars</h5>
        <a href="{{ route('admin.cars.create') }}" class="btn btn-primary">Add New Car</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Type</th>
                    <th>Price/Day</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                <tr>
                    <td>
                        @if($car->image)
                        <img src="{{ asset('storage/' . $car->image) }}" width="60" alt="{{ $car->name }}">
                        @else
                        <span class="text-muted">No image</span>
                        @endif
                    </td>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ ucfirst($car->car_type) }}</td>
                    <td>${{ number_format($car->daily_rent_price, 2) }}</td>
                    <td>
                        <span class="badge bg-{{ $car->availability ? 'success' : 'danger' }}">
                            {{ $car->availability ? 'Available' : 'Not Available' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection