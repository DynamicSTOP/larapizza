@extends('layouts.main')

@section('content')
    <div>@json($errors)</div>
    <div class="column login @if($form!=='login') d-none @endif">

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <input type="text"
                       class="@error('phone') is-invalid @enderror"
                       name="phone"
                       value="{{ old('phone') }}"
                       required
                       autofocus
                       placeholder="{{ __('Phone') }}"
                >
            </div>
            @error('phone')
            <div>{{ $message }}</div>
            @enderror

            <div>
                <input type="password"
                       class="@error('password') is-invalid @enderror"
                       name="password"
                       value=""
                       required
                       autofocus
                       placeholder="{{ __('Password') }}"
                >
            </div>
            @error('password')
            <div>{{ $message }}</div>
            @enderror

            <div>
                <input class="form-check-input" type="checkbox" name="remember"
                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <div>
                <button type="submit">{{ __('Login') }}</button>
            </div>
        </form>

    </div>

    <div class="column register @if($form!=='register') d-none @endif">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <input type="text"
                       class="@error('phone') is-invalid @enderror"
                       name="phone"
                       value="{{ old('phone') }}"
                       required
                       autofocus
                       placeholder="{{ __('Phone') }}"
                >
            </div>
            @error('phone')
            <div>{{ $message }}</div>
            @enderror

            <div>
                <input type="password"
                       class="@error('password') is-invalid @enderror"
                       name="password"
                       value=""
                       required
                       autocomplete="new-password"
                       autofocus
                       placeholder="{{ __('Password') }}"
                >
            </div>
            @error('password')
            <div>{{ $message }}</div>
            @enderror
            <div>
                <input type="password"
                       class="@error('password') is-invalid @enderror"
                       name="password_confirmation"
                       value=""
                       required
                       autocomplete="new-password"
                       autofocus
                       placeholder="{{ __('Password') }}"
                >
            </div>

            <div>
                <button type="submit">{{ __('Register') }}</button>
            </div>
        </form>
    </div>
@endsection
