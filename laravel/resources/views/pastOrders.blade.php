@extends('layouts.main')


@section('content')
    <div class="container col-xl-6">
        @if(count($orders)===0)
            <h3>No order info!</h3>
        @else

            <div class="column">
                @foreach($orders as $order)
                    <div class="past-order-item">
                        <div class="column details">
                            <div><strong>Id:</strong> {{ ($order->id) }}</div>
                            <div><strong>Date:</strong> {{ ($order->created_at)->format('m/d/Y H:i') }}</div>
                            <div><strong>Name:</strong> {{ $order->first_name }} {{$order->last_name}}</div>
                            <div><strong>Address:</strong> {{ $order->address }}</div>
                            <div><strong>Comment:</strong> {{ $order->comment }}</div>
                            <div><strong>Currency:</strong> {{ $order->currency }}</div>
                        </div>

                        <div>
                            <table class="ct-responsive-table">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Qunantity</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $currency = $order->currency==='euro' ? "&euro;" : "&dollar;";
                                    $total = $order->delivery;
                                @endphp
                                @foreach($order->items as $item)
                                    @php
                                        $total += $item->price * $item->quantity;
                                    @endphp
                                    <tr>
                                        <td data-title="Product">
                                            <div class="cart-product-wrapper">
                                                <div class="cart-product-body">
                                                    <h6>{{$item->goods->name}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-title="Quantity">x{{$item->quantity}}</td>
                                        <td data-title="Total"><strong>{!! $currency !!}@moneyNC($item->price *
                                                $item->quantity)</strong></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="nobefore" colspan="2"><h6>Delivery</h6></td>
                                    <td class="nobefore"><strong>{!! $currency !!}
                                            @moneyNC($order->delivery)</strong></td>
                                </tr>
                                <tr class="total">
                                    <td>
                                        <h6 class="mb-0">Grand Total</h6>
                                    </td>
                                    <td></td>
                                    <td><strong>{!! $currency !!}@moneyNC($total)</strong></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                @endforeach
            </div>
        @endif
    </div>
@endsection
