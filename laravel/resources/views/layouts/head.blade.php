<!-- Preloader Start -->
<div class="ct-preloader">
    <div class="ct-preloader-inner">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
</div>
<!-- Preloader End -->

@unless(isset($hideCart))
    @include('partial.cartSidebar')
@endunless


<!-- Aside (Mobile Navigation) -->
<aside class="main-aside">
    <a class="navbar-brand" href="{{route('menu')}}"> <img src="/images/logo.png" alt="logo"> </a>

    <div class="aside-scroll">
        <ul>
            <li class="menu-item ">
                <a href="{{route('index')}}">Home</a>
            </li>
            <li class="menu-item menu-item-has-children">
                <a href="#">Account</a>
                <ul class="submenu">
                    @if(Auth::check())
                        <li class="menu-item"><a href="{{route('orders')}}">Orders</a></li>
                        <li class="menu-item"><a href="{{route('logout')}}">Logout</a></li>
                    @else
                        <li class="menu-item"><a href="{{route('login')}}">Login</a></li>
                        <li class="menu-item"><a href="{{route('register')}}">Register</a></li>
                    @endif
                </ul>
            </li>
            <li class="menu-item">
                <a href="{{route('menu')}}">Menu</a>
            </li>
            <li class="menu-item">
                <a href="{{route('locations')}}">Locations</a>
            </li>
            <li class="menu-item">
                <a href="{{route('contact-us')}}">Contact Us</a>
            </li>
        </ul>

    </div>

</aside>
<div class="aside-overlay aside-trigger"></div>

<!-- Header Start -->
<header class="main-header header-1">

    <div class="top-header">
        <div class="container">
            <div class="top-header-inner">

                <div class="top-header-contacts">
                    <ul class="top-header-nav">
                        <li><a class="p-0" href="tel:+123456789"><i class="fas fa-phone mr-2"></i> +123 456 789</a></li>
                    </ul>
                </div>

                <ul class="top-header-nav header-cta">
                    <li><a href="{{route('menu')}}">Order Online</a></li>
                </ul>

            </div>
        </div>
    </div>

    <div class="container">
        <nav class="navbar">
            <!-- Logo -->
            <a class="navbar-brand" href="{{route('index')}}"> <img src="/images/logo.png" alt="logo"> </a>
            <!-- Menu -->
            <ul class="navbar-nav">
                <li class="menu-item ">
                    <a href="{{route('index')}}">Home</a>
                </li>
                <li class="menu-item menu-item-has-children">
                    <a href="#">Account</a>
                    <ul class="submenu">
                        @if(Auth::check())
                            <li class="menu-item"><a href="{{route('orders')}}">orders</a></li>
                            <li class="menu-item"><a href="{{route('logout')}}">logout</a></li>
                        @else
                            <li class="menu-item"><a href="{{route('login')}}">login</a></li>
                            <li class="menu-item"><a href="{{route('register')}}">register</a></li>
                        @endif
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="{{route('menu')}}">Menu</a>
                </li>
                <li class="menu-item">
                    <a href="{{route('locations')}}">Locations</a>
                </li>
                <li class="menu-item">
                    <a href="{{route('contact-us')}}">Contact Us</a>
                </li>
            </ul>

            <div class="header-controls">
                @unless(isset($hideCart) || !isset($cartQuantity))
                    <ul class="header-controls-inner">
                        <li class="cart-dropdown-wrapper currency-switch">
                            <span>@if(Session::get('currency','euro')==='euro')&euro;@else&dollar;@endif</span>
                        </li>
                        <li class="cart-dropdown-wrapper cart-trigger">
                            <span
                                class="cart-item-count @if($cartQuantity===0) d-none @endif">{{ $cartQuantity > 0 ? $cartQuantity : ''}}</span>
                            <i class="flaticon-shopping-bag"></i>
                        </li>
                    </ul>
            @endunless
            <!-- Toggler -->
                <div class="aside-toggler aside-trigger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

        </nav>
    </div>

</header>
<!-- Header End -->
