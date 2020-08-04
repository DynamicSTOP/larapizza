@php
    $total_usd = 0;
    $total_euro = 0;
@endphp
<div class="table">
    @if(isset($cartData) && count($cartData['goods']) > 0 )
        @foreach($cartData['goods'] as $goods)
            @php
                $total_usd += $goods->price_usd * $cartData['cart'][$goods->id];
                $total_euro += $goods->price_euro * $cartData['cart'][$goods->id];
            @endphp
            <div class="row goods-row">
                <div>{{$goods->name}}</div>
                <div data-price_usd="@moneyNC($goods->price_usd)"
                     data-price_euro="@moneyNC($goods->price_euro)"
                >@money($goods->getPrice())
                </div>
                <div>{{$cartData['cart'][$goods->id]}}</div>
                <div data-price_usd="@moneyNC($goods->price_usd * $cartData['cart'][$goods->id])"
                     data-price_euro="@moneyNC($goods->price_euro * $cartData['cart'][$goods->id])"
                >@money($goods->getPrice() * $cartData['cart'][$goods->id])
                </div>
            </div>
        @endforeach
    @endif
    @if(isset($delivery_usd))
        @php
        $total_usd += $delivery_usd;
        $total_euro += $delivery_euro;
        $delivery = Session::get('currency','euro') === 'euro'? $delivery_euro : $delivery_usd;
        @endphp
        <div class="row">
            <div>Delivery</div>
            <div></div>
            <div></div>
            <div data-price_usd="@moneyNC($delivery_usd)" data-price_euro="@moneyNC($delivery_euro)">@money($delivery)</div>
        </div>
    @endif
</div>
@php
    $total = Session::get('currency','euro') === 'euro'? $total_euro : $total_usd;
@endphp
<div class="total">Total: <span data-price_usd="@moneyNC($total_usd)" data-price_euro="@moneyNC($total_euro)">@money($total)</span></div>
@unless(isset($hideCheckoutLink))
    <div><a href="/checkout">Checkout</a></div>
@endunless
