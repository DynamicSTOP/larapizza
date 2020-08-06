@extends('layouts.main')

@section('content')
@include('partial.banner',['goodsCategories'=>$goodsCategories])
@include('partial.menu',['goodsCategories'=>$goodsCategories])
@include('partial.info')
@endsection

