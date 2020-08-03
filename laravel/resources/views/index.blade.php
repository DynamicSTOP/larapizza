@extends('layouts.main')

@section('content')
    <script type="text/javascript">
        const cartData = @json($cartData);
    </script>
    @include('goodsBlock',['title'=>'Pizzas', 'goods'=>$pizzas])
    @include('goodsBlock',['title'=>'Salads', 'goods'=>$salads])
    @include('goodsBlock',['title'=>'Drinks', 'goods'=>$beverages])
    @include('cartPopup')
@endsection

