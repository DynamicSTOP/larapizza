@extends('layouts.main')

@section('content')
    <form method="POST" action="/checkout">
        @csrf
        <div class="row checkout">
            <div class="clientInfo column">
                <div class="row" >
                    <div>
                        <input class="@error('first_name') is-invalid @enderror"
                               type="text"
                               value=""
                               name="first_name"
                               placeholder="First name"
                        >

                    </div>
                    <div>
                        <input class="@error('last_name') is-invalid @enderror"
                               type="text"
                               value=""
                               name="last_name"
                               placeholder="Last name"
                        >
                    </div>
                </div>
                @error('first_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('last_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div>
                    <input class="@error('address') is-invalid @enderror long"
                           type="text"
                           value=""
                           name="address"
                           placeholder="Address"
                    >
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row half">
                    <div>
                        <input class="@error('phone') is-invalid @enderror"
                               type="text"
                               value=""
                               name="phone"
                               placeholder="Phone"
                        >
                    </div>

                    <div class="currencyBox row">
                        <div>
                            <label for="euro">EURO</label>
                            <input id="euro"
                                   class="@error('currency') is-invalid @enderror"
                                   type="radio"
                                   value="euro"
                                   checked
                                   name="currency"
                            >
                        </div>
                        <div>
                            <label for="usd">USD</label>
                            <input id="usd"
                                   class="@error('currency') is-invalid @enderror"
                                   type="radio"
                                   value="usd"
                                   name="currency"
                            >
                        </div>
                    </div>
                </div>
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('currency')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <div>
                    <textarea name="comment"
                              class="long"
                              id="comment"
                              placeholder="Comment"></textarea>
                </div>

            </div>
            <div class="column details">
                @include('partial.cartDetails')
            </div>
        </div>
        <div class="row">
            <button class="submit" type="submit">Order</button>
        </div>
    </form>
@endsection
