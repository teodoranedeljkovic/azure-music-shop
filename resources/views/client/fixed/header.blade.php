<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="logo">
            <h1 class="text-light"><a href="{{ route('home') }}"><span>Azure</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="active " href="{{ route('home') }}">Home</a></li>
                <li><a href=" {{ route('about') }}">About</a></li>
                <li><a href="{{ route('home.albums') }}">Albums</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>

                @if(session()->has('user'))
                    <li><a href="{{ route('cart') }}">Cart</a></li>
                    <li><a href="{{ route('orders') }}">See Orders</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                @elseif(!session()->has('user'))
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endif


            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
