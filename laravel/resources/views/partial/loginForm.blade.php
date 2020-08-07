<form method="POST" action="{{ route('login') }}">
    <div class="row">
        @csrf
        @if(isset($checkout))
            <input type="hidden" value="checkout" name="checkout">
        @endif
        <div class="col-xl-6 form-group">
            <label class="phone">Phone Number</label>
            <input class="form-control @error('phone') is-invalid @enderror"
                   id="phone"
                   type="text"
                   name="phone"
                   value="{{ old('phone') }}"
                   required
                   autofocus
                   placeholder="{{ __('Phone') }}">
        </div>
        <div class="col-xl-6 form-group">
            <label for="password">Password</label>
            <input class="form-control @error('password') is-invalid @enderror"
                   id="password"
                   type="password"
                   name="password"
                   value=""
                   required
                   autofocus
                   placeholder="{{ __('Password') }}">
        </div>
        @error('phone')
        <div class="col-xl-12 form-group">{{ $message }}</div>
        @enderror
        @error('password')
        <div class="col-xl-12 form-group">{{ $message }}</div>
        @enderror
        <div class="col-12 form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox"
                       name="remember"
                       class="custom-control-input"
                       id="rememberMe" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="rememberMe">{{ __('Remember Me') }}</label>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn-custom shadow-none btn-sm" name="button">{{ __('Login') }}</button>
        </div>
    </div>

</form>
