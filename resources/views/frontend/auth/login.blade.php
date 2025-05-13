@extends('frontend.inc.layout')

@section('title', 'Login')

@section('content')
    <section class="accounts-section">
        <div class="container">
            <div class="acounts-card">
                <div class="featured-top">
                    <div class="card m-auto">
                        <form action="{{ route('frontend.login') }}" method="POST" class="request-form bg-primary">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="eg. Email...">
                            </div>
                            
                            <div class="form-group">
                                <label for="password" class="label">Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="eg. Password...">
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-secondary">Login</button>
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
