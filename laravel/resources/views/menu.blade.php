@extends('layouts.main')

@section('content')
    @include('partial.menu',['goodsCategories'=>$goodsCategories])
@endsection

