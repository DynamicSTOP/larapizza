@extends('layouts.main')
@section('content')
    <div>
        <p>Your order has been placed!</p>
        <p>Order number is {{$order->id}}</p>
    </div>
@endsection
