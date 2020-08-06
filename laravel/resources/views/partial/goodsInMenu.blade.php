<!-- Product Start -->
<div class="col-lg-4 col-md-6 {{$class}}">
    <div class="product">
        <div class="product-thumb"> <img src="{{$goods->getImage()}}" alt="menu item" /> </div>
        <div class="product-body">
            <div class="product-desc">
                <h4>{{$goods->name}}</h4>
                <div class="ct-rating-wrapper">
                    <div class="ct-rating">
                        @for ($i = 0; $i < rand(4,5); $i++)
                            <i class="fas fa-star active"></i>
                        @endfor
                    </div>
                </div>
                <p>{{$goods->description}}</p>
            </div>
            <div class="product-controls" data-id="{{$goods->id}}">
                <p class="product-price"
                   data-price_usd="@moneyNC($goods->price_usd)"
                   data-price_euro="@moneyNC($goods->price_euro)"
                >@money($goods->getPrice())</p>

                <div class="product-quantity-controls row {{isset($cartData['cart'][$goods->id])?'':'d-none'}}">
                    <div class="btn-custom btn-sm minus"><img src="/icons/chevron-bottom.svg"></div>
                    <div class="quantity">{{ isset($cartData['cart'][$goods->id])? $cartData['cart'][$goods->id] : 1}}</div>
                    <div class="btn-custom btn-sm plus"><img src="/icons/chevron-top.svg"></div>
                </div>
                <a href="#"
                   data-order_menu
                   class="order-item btn-custom btn-sm shadow-none {{isset($cartData['cart'][$goods->id])?'d-none':''}}"
                >Order <i class="fas fa-shopping-cart"></i> </a>

            </div>
        </div>
    </div>
</div>
<!-- Product End -->
