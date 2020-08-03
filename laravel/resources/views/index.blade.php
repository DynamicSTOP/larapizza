@extends('layouts.main')

@section('content')
    <div>
        <pre>
            @json($cart)
        </pre>
    </div>

    @include('goodsBlock',['title'=>'Pizzas', 'goods'=>$pizzas])
    @include('goodsBlock',['title'=>'Salads', 'goods'=>$salads])
    @include('goodsBlock',['title'=>'Drinks', 'goods'=>$beverages])
@endsection

