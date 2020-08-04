@php
    $total = 0;
@endphp
<div class="table">
    @if(count($cartData['goods']) > 0 )
        @foreach($cartData['goods'] as $goods)
            @php
                $total += $goods->price_euro * $cartData['cart'][$goods->id];
            @endphp
            <div class="row goods-row">
                <div>{{$goods->name}}</div>
                <div data-price>@money($goods->price_euro)&euro;</div>
                <div>{{$cartData['cart'][$goods->id]}}</div>
                <div>@money($goods->price_euro * $cartData['cart'][$goods->id])&euro;</div>
            </div>
        @endforeach
    @endif
</div>
<div class="total">Total: @money($total)&euro;</div>
<div><a href="/checkout">Checkout</a></div>
