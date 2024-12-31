<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">Sparkify</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('home') }}" class="{{ Request::routeIs('home') ? 'active is-request' : '' }}">Home</a></li>
                <li><a href="{{ route('about') }}" class="{{ Request::routeIs('about') ? 'active is-request' : '' }}">About</a></li>
                 <li><a href="{{ route('services') }}" class="{{ Request::routeIs('services') ? 'active is-request' : '' }}">Services</a></li>
                 <li><a href="{{ route('contact') }}" class="{{ Request::routeIs('contact') ? 'active is-request' : '' }}">Contact</a></li>
                 <li><a href="{{ route('price') }}" class="{{ Request::routeIs('price') ? 'active is-request' : '' }}">Pricing</a></li>
             
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</header>