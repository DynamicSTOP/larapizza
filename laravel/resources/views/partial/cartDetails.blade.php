@php
    $total = 0;
@endphp
<div class="table">
    @if(isset($cartData) && count($cartData['goods']) > 0 )
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
    @if(isset($delivery))
        @php
        $total += $delivery;
        @endphp
        <div class="row">
            <div>Delivery</div>
            <div></div><div></div>
            <div>@money($delivery)&euro;</div>
        </div>
    @endif
</div>
<div class="total">Total: @money($total)&euro;</div>
@unless(isset($hideCheckoutLink))
    <div><a href="/checkout">Checkout</a></div>
@endunless
