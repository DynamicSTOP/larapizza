<div class="itemContainer">
    <div
        class="goods--item column"
        data-id="{{$goods->id}}"
    >
        <div>
            <div>
                <img src="{{$goods->getImage()}}">
            </div>
            <div>
                <h4>{{$goods->name}}</h4>
            </div>
            <div>
                {{$goods->description}}
            </div>
        </div>
        <div class="bottomRow row">
            <div class="price"
                 data-price_usd="@moneyNC($goods->price_usd)"
                 data-price_euro="@moneyNC($goods->price_euro)"
            >@money($goods->getPrice())</div>
            <div class="buyBtnBox">
                <div class="quantityControls row {{isset($cartData['cart'][$goods->id])?'':'d-none'}}">
                    <div class="minus"><img src="/icons/chevron-bottom.svg"></div>
                    <div class="quantity">{{ isset($cartData['cart'][$goods->id])? $cartData['cart'][$goods->id] : 1}}</div>
                    <div class="plus"><img src="/icons/chevron-top.svg"></div>
                </div>
                <button type="button" class="buyBtn {{isset($cartData['cart'][$goods->id])?'d-none':''}}">BUY</button>
            </div>
        </div>

    </div>

</div>
