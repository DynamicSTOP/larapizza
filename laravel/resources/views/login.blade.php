@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="container col-xl-6">
            @if($form ==='login')
                @include('partial.loginForm')
            @else
                @include('partial.registerForm')
            @endif
        </div>
    </section>
@endsection
