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
                <button data-goodsid="{{$goods->id}}" type="button" class="buyBtn">BUY</button>
            </div>
        </div>

    </div>

</div>
