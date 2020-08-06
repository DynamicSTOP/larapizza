@extends('layouts.main')


@section('content')
    <!-- Checkout Start -->
    <section class="section">
        <div class="container">
            <p>Checkout success! Order number {{$order->id}}.</p>
        </div>
    </section>
    <!-- Checkout End -->
@endsection
