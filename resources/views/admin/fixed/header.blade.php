<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="logo">
            <h1 class="text-light"><a href="{{ route('admin.home') }}"><span>Moderna</span></a></h1>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="active " href="{{ route('admin.home') }}">Home</a></li>
                <li><a href="{{ route('albums.index') }}">Albums</a></li>
                <li><a href="{{ route('admin.orders') }}">Orders</a></li>
                <li><a href="{{ route('useractions') }}">User Actions</a></li>

                @if(session()->has('user'))
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
