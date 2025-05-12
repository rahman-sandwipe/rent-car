<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Car<span>Book</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a href="{{ route('frontend.home') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item {{ request()->is('about-us') ? 'active' : '' }}">
                    <a href="{{ route('frontend.abouts') }}" class="nav-link">About</a>
                </li>
                <li class="nav-item {{ request()->is('rentals') ? 'active' : '' }}">
                    <a href="{{ route('frontend.rentals') }}" class="nav-link">Rentals</a>
                </li>
                <li class="nav-item {{ request()->is('blogs') ? 'active' : '' }}">
                    <a href="{{ route('frontend.blogs') }}" class="nav-link">Blog</a>
                </li>
                <li class="nav-item {{ request()->is('contact-us') ? 'active' : '' }}">
                    <a href="{{ route('frontend.contacts') }}" class="nav-link">Contacts</a>
                </li>
                <li class="nav-item {{ request()->is('login') ? 'active' : '' }}">
                    <a href="{{ route('frontend.login') }}" class="nav-link">Login</a>
                </li>
                <li class="nav-item {{ request()->is('register') ? 'active' : '' }}">
                    <a href="{{ route('frontend.register') }}" class="nav-link">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
