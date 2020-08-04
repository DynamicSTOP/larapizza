@extends('layouts.main')

@section('content')
    @include('goodsBlock',['title'=>'Pizzas', 'goods'=>$pizzas])
    @include('goodsBlock',['title'=>'Salads', 'goods'=>$salads])
    @include('goodsBlock',['title'=>'Drinks', 'goods'=>$beverages])
    @include('cartPopup')
@endsection

