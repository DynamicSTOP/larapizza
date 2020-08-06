@extends('layouts.main')


@section('content')
    <!-- Checkout Start -->
    <section class="section">
        <div class="container">

            <div class="row">
                <div class="col-xl-7">
                @unless(Auth::check())
                    <!-- Login -->
                        <div class="ct-notice">
                            <p>Are you a returning customer? <a href="#">Click here to login</a></p>
                        </div>
                        <div class="ct-notice-content">
                            @include('partial.loginForm',['checkout'=>true])
                        </div>
                    @endunless

                    <form method="post" action="/checkout" data-form_checkout>
                        @csrf
                        @include('partial.order.buyerInfoForm')
                    </form>
                </div>
                <div class="col-xl-5 checkout-billing">
                    @include('partial.order.details')
                </div>
            </div>


        </div>
    </section>
    <!-- Checkout End -->
@endsection
