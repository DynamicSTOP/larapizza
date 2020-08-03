<div class="itemContainer">
    <div
        class="goods--item column"
        data-id="{{$goods->id}}"
        data-price_usd="{{$goods->price_usd}}"
        data-price_euro="{{$goods->price_euro}}"
        data-type="{{$goods->type}}"
        data-name=@json($goods->name)
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
            <div class="price">{{$goods->price_euro}}&euro;</div>
            <div class="buyBtnBox">
                <div class="quantityControls row {{isset($cart[$goods->id])?'':'d-none'}}">
                    <div class="minus"><img src="/icons/chevron-bottom.svg"></div>
                    <div class="quantity">{{ isset($cart[$goods->id])? $cart[$goods->id] : 1}}</div>
                    <div class="plus"><img src="/icons/chevron-top.svg"></div>
                </div>
                <button type="button" class="buyBtn {{isset($cart[$goods->id])?'d-none':''}}">BUY</button>
            </div>
        </div>

    </div>

</div>
