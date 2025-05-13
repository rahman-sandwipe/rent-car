@extends('auth.master')

@section('title', 'Register')

@section('content')
    <div class="auth-bg d-flex min-vh-100 justify-content-center align-items-center">
        <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card overflow-hidden text-center rounded-4 p-xxl-4 p-3 mb-0">
                    <a href="{{ url('/') }}" class="auth-brand mb-2">
                        <img src="{{ asset('images/logo-dark.png') }}" alt="dark logo" height="26" class="logo-dark">
                        <img src="{{ asset('images/logo.png') }}" alt="logo light" height="26" class="logo-light">
                    </a>

                    <p class="text-muted mb-2">Create new account.</p>

                    <form action="{{ route('register') }}" method="POST" class="text-start mb-2">
                        @csrf
                        <div class="mb-2">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter name">
                        </div>

                        <div class="mb-2">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter email">
                        </div>

                        <div class="mb-2">
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter phone">
                        </div>

                        <div class="mb-2">
                            <textarea name="address" id="address" rows="3" class="form-control" placeholder="Enter address"></textarea>
                        </div>

                        <div class="mb-2">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter password">
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary fw-semibold" type="submit">Sign Up</button>
                        </div>
                    </form>

                    <p class="text-nuted fs-14 mb-0">Already have an account? <a href="{{ route('login') }}" class="fw-semibold text-danger ms-1">Login !</a></p>

                </div>
                <p class="mt-4 text-center mb-0">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © {{ config('app.name') }} - By
                    <span class="fw-bold text-decoration-underline text-uppercase text-reset fs-12">Morex Solutions</span>
                </p>
            </div>
        </div>
    </div>
@endsection
