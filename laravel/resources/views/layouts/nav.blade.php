<nav class="row">
    <div class="navbar-brand">
        <a href="/">LARA PIZZA</a>
    </div>
    <div class="row">
        <div class="cartButton">
            <img src="/icons/cart.svg">
            <span class=" @if($cartQuantity === 0) d-none @endif cartQuantity">{{$cartQuantity}}</span>
            Cart
            <div class="cart--details column">
                @if($cartQuantity > 0 )
                    @php
                        $total = 0;
                    @endphp
                    <div class="table">
                        @foreach($cartData['goods'] as $goods)
                            @php
                                $total += $goods->price_euro * $cartData['cart'][$goods->id];
                            @endphp

                            <div class="row">
                                <div>{{$goods->name}}</div>
                                <div>{{$goods->price_euro}}&euro;</div>
                                <div>{{$cartData['cart'][$goods->id]}}</div>
                                <div>{{$goods->price_euro * $cartData['cart'][$goods->id]}}&euro;</div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div>Cart is empty</div>
                @endif
                    <div class="total">Total: {{$total}}&euro;</div>
                <div><a href="/checkout">Checkout</a></div>
            </div>
        </div>

    </div>
</nav>
