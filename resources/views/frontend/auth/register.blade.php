@extends('frontend.inc.layout')

@section('title', 'Login')

@section('content')
    <section class="accounts-section">
        <div class="container">
            <div class="acounts-card">
                <div class="featured-top">
                    <div class="card m-auto">
                        <form action="{{ route('frontend.register') }}" method="POST" class="request-form bg-primary">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="label">Name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="eg. Name...">
                            </div>

                            <div class="form-group">
                                <label for="email" class="label">Email</label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="eg. Email...">
                            </div>
                            
                            <div class="form-group">
                                <label for="phone" class="label">Phone</label>
                                <input type="number" id="phone" name="phone_number" class="form-control" placeholder="eg. Phone...">
                            </div>
                            
                            <div class="form-group">
                                <label for="address" class="label">Address</label>
                                <input type="text" id="address" name="address" class="form-control" placeholder="eg. Address...">
                            </div>
                            
                            <div class="form-group">
                                <label for="password" class="label">Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="eg. Password...">
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" value="Register A Customer" class="btn btn-secondary py-2">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection
@section('styles')
    <style>
        .accounts-section {
            margin: 30% 0 5% 0;
        }
        .acounts-card {
            width: 400px;
            margin: 0 auto;
        }
    </style>
@endsection
