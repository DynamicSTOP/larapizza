<div class="goods--block">
    <div>
        <h2>{{$title}}</h2>
    </div>
    <div class="goods">
        @foreach ($goods as $g)
            @include('goodsItem',['goods'=>$g])
        @endforeach
    </div>
</div>
