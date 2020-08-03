<div class="itemContainer">
    <div
        data-goodsId="{{$goods->id}}"
        data-goodsPriceUsd="{{$goods->price_usd}}"
        data-goodsPriceEuro="{{$goods->price_euro}}"
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
            <div class="price">{{$goods->price_euro}}&euro;</div>
            <input class="quantity" type="number" value="1">
            <button type="button" class="buyBtn">BUY</button>
        </div>

    </div>

</div>
