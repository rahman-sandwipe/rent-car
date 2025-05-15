<div class="sidenav-menu">

    <!-- Brand Logo -->
    <a href="index.html" class="logo">
        <span class="logo-light">
            <span class="logo-lg"><img src="{{ asset('images/logo.png') }}" alt="logo"></span>
            <span class="logo-sm"><img src="{{ asset('images/logo-sm.png') }}" alt="small logo"></span>
        </span>
        <span class="logo-dark">
            <span class="logo-lg"><img src="{{ asset('images/logo-dark.png') }}" alt="dark logo"></span>
            <span class="logo-sm"><img src="{{ asset('images/logo-sm.png') }}" alt="small logo"></span>
        </span>
    </a>

    <!-- Full Sidebar Menu Close Button -->
    <button class="button-close-fullsidebar">
        <i class="ri-close-line align-middle"></i>
    </button>

    <div data-simplebar>

        <!--- Sidenav Menu -->
        <ul class="side-nav">
            <li class="side-nav-title">Navigation</li>

            <li class="side-nav-item">
                <a href="{{ route('dashboard') }}" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="airplay"></i></span>
                    <span class="menu-text"> Dashboard </span>
                </a>
                <li class="side-nav-item">
                    <a href="{{ route('auth.customers') }}" class="side-nav-link">
                        <span class="menu-icon"><i data-lucide="airplay"></i></span>
                        <span class="menu-text"> Customers </span>
                    </a>
                </li>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('auth.cars') }}" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="airplay"></i></span>
                    <span class="menu-text"> Cars</span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('auth.rentals') }}" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="airplay"></i></span>
                    <span class="menu-text"> Rentals </span>
                </a>
            </li>
        </ul>

        <div class="clearfix"></div>
    </div>
</div>
