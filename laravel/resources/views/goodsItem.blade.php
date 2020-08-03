<div class="itemContainer">
    <div
        class="goods--item"
    >
        <div class="">
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
        <div class="bottomRow">
            <div data-goodsPriceUsd="{{$goods->price_usd}}"
                data-goodsPriceEuro="{{$goods->price_euro}}"
                class="price">{{$goods->price_euro}}&euro;</div>
            <div class="buyBtnBox">
                <div class="quantityControls {{isset($cart[$goods->id])?'':'d-none'}}">
                    <div class="minus">-</div>
                    <div>{{ isset($cart[$goods->id])? $cart[$goods->id] : 1}}</div>
                    <div class="plus">+</div>
                </div>
                <button data-goodsid="{{$goods->id}}"
                        type="button"
                        class="buyBtn {{isset($cart[$goods->id])?'d-none':''}}">BUY</button>
            </div>
        </div>

    </div>

</div>
