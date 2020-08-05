@extends('layouts.main')


@section('content')
    <div class="column orders">
        @foreach($orders as $order)
            <div class="column order">
                <div>
                    <h3>Order#{{$order->id}}</h3>
                </div>
                <div class="details column">
                    <div>Date: {{ ($order->created_at)->format('m/d/Y H:i') }}</div>
                    <div>Name: {{ $order->first_name }} {{$order->last_name}}</div>
                    <div>Address: {{ $order->address }}</div>
                    <div>Comment: {{ $order->comment }}</div>
                    <div>Currency: {{ $order->currency }}</div>
                </div>
                <div class="column orderItems">
                    @php
                        $currency = $order->currency==='euro' ? "&euro;" : "&dollar;";
                        $total = $order->delivery;
                    @endphp
                    <div class="table">
                        @foreach($order->items as $item)
                            @php
                                $total += $item->price * $item->quantity;
                            @endphp
                            <div class="row goods-row">
                                <div>{{$item->goods->name}}</div>
                                <div>@moneyNC($item->price){!! $currency !!}</div>
                                <div>{{$item->quantity}}</div>
                                <div>@moneyNC($item->price * $item->quantity){!! $currency !!}</div>
                            </div>
                        @endforeach
                        <div class="row">
                            <div>Delivery</div>
                            <div></div>
                            <div></div>
                            <div>@moneyNC($order->delivery){!! $currency !!}</div>
                        </div>
                    </div>
                    <div class="total">Total: @moneyNC($total){!! $currency !!}</div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
