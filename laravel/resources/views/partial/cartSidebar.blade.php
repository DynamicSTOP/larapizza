@php
    $total_usd = 0;
    $total_euro = 0;
@endphp
<!-- Cart Sidebar Start -->
<div class="cart-sidebar-wrapper">
    <aside class="cart-sidebar">
        <div class="cart-sidebar-header">
            <h3>Your Cart</h3>
            <div class="close-btn cart-trigger close-dark">
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="cart-sidebar-body">
            <div class="cart-sidebar-scroll">

                @if(isset($cartData) && count($cartData['goods']) > 0 )
                    @foreach($cartData['goods'] as $goods)
                        @php
                            $total_usd += $goods->price_usd * $cartData['cart'][$goods->id];
                            $total_euro += $goods->price_euro * $cartData['cart'][$goods->id];
                        @endphp


                        <div class="cart-sidebar-item">
                            <div class="media">
                                <img src="{{$goods->getImage()}}" alt="product">
                                <div class="media-body">
                                    <h5>{{$goods->name}}</h5>
                                    <span>{{$cartData['cart'][$goods->id]}}x <span
                                            data-price_usd="@moneyNC($goods->price_usd)"
                                            data-price_euro="@moneyNC($goods->price_euro)"
                                        >@money($goods->getPrice())</span></span>
                                </div>
                            </div>
                            <div class="cart-sidebar-item-meta"></div>
                            <div class="cart-sidebar-price"
                                 data-price_usd="@moneyNC($goods->price_usd * $cartData['cart'][$goods->id])"
                                 data-price_euro="@moneyNC($goods->price_euro * $cartData['cart'][$goods->id])"
                            >@money($goods->getPrice() * $cartData['cart'][$goods->id])</div>
                            <div data-id="{{$goods->id}}" class="close-btn">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    @endforeach
                @else
                    Cart is empty!
                @endif
            </div>
        </div>
        @php
            $total = Session::get('currency','euro') === 'euro'? $total_euro : $total_usd;
        @endphp
        <div class="cart-sidebar-footer">
            <h4>Total: <span data-price_usd="@moneyNC($total_usd)" data-price_euro="@moneyNC($total_euro)">@money($total)</span></h4>
            <a href="/checkout" class="btn-custom">Checkout</a>
        </div>
    </aside>
    <div class="cart-sidebar-overlay cart-trigger">
    </div>
</div>
<!-- Cart Sidebar End -->
