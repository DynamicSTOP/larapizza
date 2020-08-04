<nav class="container row">
    <div class="navbar-brand">
        <a href="/">LARA PIZZA</a>
    </div>
    <div class="row">
        <div class="cartButton">
            <img src="/icons/cart.svg">
            <span class=" @unless(isset($cartQuantity) && $cartQuantity !== 0) d-none @endif cartQuantity">{{$cartQuantity??''}}</span>
            Cart
            <div class="cart--details column">
                @if(isset($cartQuantity) && $cartQuantity !== 0)
                    @include('partial.cartDetails')
                @endif
            </div>
        </div>

    </div>
</nav>
