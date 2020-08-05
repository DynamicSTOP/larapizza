@extends('layouts.main')

@section('content')
    <form method="POST" action="/checkout">
        @csrf
        <div class="row checkout">
            <div class="clientInfo column">
                <div class="row">
                    <div class="half">
                        <input class="@error('first_name') is-invalid @enderror"
                               type="text"
                               value="{{ old('first_name') }}"
                               name="first_name"
                               placeholder="First name*"
                               required
                        >

                    </div>
                    <div class="half">
                        <input class="@error('last_name') is-invalid @enderror"
                               type="text"
                               value="{{old('last_name')}}"
                               name="last_name"
                               placeholder="Last name"
                        >
                    </div>
                </div>
                @error('first_name')
                <div>{{ $message }}</div>
                @enderror
                @error('last_name')
                <div>{{ $message }}</div>
                @enderror
                <div>
                    <input class="@error('address') is-invalid @enderror long"
                           type="text"
                           value="{{old('address')}}"
                           name="address"
                           placeholder="Address*"
                           required
                    >
                    @error('address')
                    <div>{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="half">
                        <input class="@error('phone') is-invalid @enderror"
                               type="text"
                               value="{{old('phone')}}"
                               name="phone"
                               placeholder="Phone*"
                               required
                        >
                    </div>

                    <div class="half currencyBox row">
                        <div>
                            <label for="euro">EURO</label>
                            <input id="euro"
                                   class="@error('currency') is-invalid @enderror"
                                   type="radio"
                                   value="euro"
                                   @if(Session::get('currency','euro')==='euro')
                                   checked
                                   @endif
                                   name="currency"
                                   required
                            >
                        </div>
                        <div>
                            <label for="usd">USD</label>
                            <input id="usd"
                                   class="@error('currency') is-invalid @enderror"
                                   type="radio"
                                   value="usd"
                                   @if(Session::get('currency','euro')==='usd')
                                   checked
                                   @endif
                                   name="currency"
                                   required
                            >
                        </div>
                    </div>
                </div>
                @error('phone')
                <div>{{ $message }}</div>
                @enderror
                @error('currency')
                <div>{{ $message }}</div>
                @enderror


                <div>
                    <textarea name="comment"
                              class="long"
                              id="comment"
                              placeholder="Comment">{{old('comment')}}</textarea>
                </div>

            </div>
            <div class="column details">
                @include('partial.cartDetails')
            </div>
        </div>
        <div class="row order">
            <button class="submit" type="submit">Order</button>
        </div>
    </form>
@endsection
