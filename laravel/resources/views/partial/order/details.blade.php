@php
    $total_usd = 0;
    $total_euro = 0;
@endphp
<!-- Order Details Start -->
<table class="ct-responsive-table">
    <thead>
    <tr>
        <th>Product</th>
        <th>Qunantity</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cartData['goods'] as $goods)
        @php
            $total_usd += $goods->price_usd * $cartData['cart'][$goods->id];
            $total_euro += $goods->price_euro * $cartData['cart'][$goods->id];
        @endphp
        <tr>
            <td data-title="Product">
                <div class="cart-product-wrapper">
                    <div class="cart-product-body">
                        <h6>{{$goods->name}}</h6>
                        <p>{{$goods->description}}</p>
                    </div>
                </div>
            </td>
            <td data-title="Quantity">x{{$cartData['cart'][$goods->id]}}</td>
            <td data-title="Total"> <strong
                    data-price_usd="@moneyNC($goods->price_usd * $cartData['cart'][$goods->id])"
                    data-price_euro="@moneyNC($goods->price_euro * $cartData['cart'][$goods->id])"
                >@money($goods->getPrice() * $cartData['cart'][$goods->id])</strong> </td>
        </tr>
    @endforeach
    @if(isset($delivery_usd))
        @php
            $total_usd += $delivery_usd;
            $total_euro += $delivery_euro;
            $delivery = Session::get('currency','euro') === 'euro'? $delivery_euro : $delivery_usd;
        @endphp
        <tr>
            <td class="nobefore" colspan="2"><h6>Delivery</h6></td>
            <td class="nobefore"> <strong data-price_usd="@moneyNC($delivery_usd)"
                                            data-price_euro="@moneyNC($delivery_euro)"
                >@money($delivery)</strong> </td>
        </tr>
    @endif
    @php
        $total = Session::get('currency','euro') === 'euro'? $total_euro : $total_usd;
    @endphp
    <tr class="total">
        <td>
            <h6 class="mb-0">Grand Total</h6>
        </td>
        <td></td>
        <td> <strong data-price_usd="@moneyNC($total_usd)"
                     data-price_euro="@moneyNC($total_euro)"
            >@money($total)</strong> </td>
    </tr>
    </tbody>
</table>
@unless(isset($hideOrderButton))
    <button type="submit" class="btn-custom primary btn-block" data-order_button>Place Order</button>
@endunless
<!-- Order Details End -->
