<nav class="container row">
    <div class="navbar-brand">
        <a href="{{route('index')}}">LARA PIZZA</a>
    </div>
    <div class="row">
        @unless(Request::is('register') || Request::is('login'))
            <div class="user" title="Profile"><img src="/icons/person.svg">
                <div class="user--details column">
                    @unless(Auth::check())
                        <div><a href="{{ route('login') }}">Login</a></div>
                        <div><a href="{{ route('register') }}">Register</a></div>
                    @endif
                    <div @unless(Auth::check()) class="d-none" @endunless><a href="{{ route('orders') }}">Orders</a>
                    </div>
                    @if(Auth::check())
                        <div><a href="{{ route('logout') }}">Logout</a></div>
                    @endif
                </div>
            </div>
        @endunless
        <div class="currency" title="Switch Currency">
            @if(Session::get('currency','euro')==='euro')&euro;@else&dollar;@endif</div>
        <div class="cartButton">
            <img src="/icons/cart.svg">
            <span
                class=" @unless(isset($cartQuantity) && $cartQuantity !== 0) d-none @endif cartQuantity">{{$cartQuantity??''}}</span>
            <div class="cart--details column">
                @if(isset($cartQuantity) && $cartQuantity !== 0)
                    @include('partial.cartDetails')
                @endif
            </div>
        </div>

    </div>
</nav>
