<!-- Navbar & Hero Start -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
    <a href="" class="navbar-brand p-0">
        <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Kawa Ngopi</h1>
        <!-- <img src="img/logo.png" alt="Logo"> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0 pe-4">
            <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
            <a href="{{ route('landingpage.about') }}"
                class="nav-item nav-link {{ request()->is('landingpage/about') ? 'active' : '' }}">About</a>
            <a href="{{ route('landingpage.service') }}"
                class="nav-item nav-link {{ request()->is('landingpage/service') ? 'active' : '' }}">Service</a>
            <a href="{{ route('landingpage.menu') }}"
                class="nav-item nav-link {{ request()->is('landingpage/menu') ? 'active' : '' }}">Menu</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu m-0">
                    <a href="{{ route('landingpage.booking') }}"
                        class="dropdown-item {{ request()->is('landingpage/booking') ? 'active' : '' }}">Booking</a>
                    <a href="{{ route('landingpage.team') }}"
                        class="dropdown-item {{ request()->is('landingpage/team') ? 'active' : '' }}">Our Team</a>
                    <a href="{{ route('landingpage.testimonial') }}"
                        class="dropdown-item {{ request()->is('landingpage/testimonial') ? 'active' : '' }}">Testimonial</a>
                </div>
            </div>
            <a href="{{ route('landingpage.contact') }}"
                class="nav-item nav-link {{ request()->is('landingpage/contact') ? 'active' : '' }}">Contact</a>
        </div>
        <a href="" class="btn btn-primary py-2 px-4">Login</a>
    </div>

</nav>

<!-- Navbar & Hero End -->
