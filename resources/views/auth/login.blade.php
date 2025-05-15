@extends('auth.master')
@section('title', 'Login')
@section('content')
    <div class="auth-bg d-flex min-vh-100 justify-content-center align-items-center">
        <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card overflow-hidden text-center rounded-4 p-3">
                    <a href="{{ url('/') }}" class="auth-brand mb-1">
                        <h3 class="logo-dark">{{ config('app.name') }}</h3>
                        <h3 class="logo-light">{{ config('app.name') }}</h3>    
                    </a>
                    <p class="text-muted mb-2">Access Account</p>

                    <form action="{{ route('login') }}" method="POST" class="text-start mb-3">
                        @csrf
                        <div class="mb-2">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter email">
                        </div>

                        <div class="mb-3">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter password">
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                <label class="form-check-label" for="checkbox-signin">Remember me</label>
                            </div>

                            <a href="{{ route('forgotRecover') }}" class="text-muted border-bottom border-dashed">Forget Password</a>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary fw-semibold" type="submit">Sign In</button>
                        </div>
                    </form>

                    <p class="text-nuted fs-14 mb-0">Don't have an account?
                        <a href="{{ route('register') }}" class="fw-semibold text-danger ms-1">Register !</a>
                    </p>

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