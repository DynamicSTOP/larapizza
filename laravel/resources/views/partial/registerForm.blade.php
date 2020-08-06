<form method="POST" action="{{ route('register') }}">
    <div class="row">
        @csrf
        <div class="col-xl-12 p-0">
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

        @error('phone')
        <div class="col-xl-6 form-group">{{ $message }}</div>
        @enderror
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
                   autocomplete="new-password"
                   placeholder="{{ __('Password') }}">
        </div>
        @error('password')
        <div class="col-xl-6 form-group">{{ $message }}</div>
        @enderror
        <div class="col-xl-6 form-group">
            <label for="password">Repeat Password</label>
            <input class="form-control @error('password') is-invalid @enderror"
                   id="password"
                   type="password"
                   name="password_confirmation"
                   value=""
                   required
                   autofocus
                   autocomplete="new-password"
                   placeholder="{{ __('Password') }}">
        </div>
        <div class="col-12">
            <button type="submit" class="btn-custom shadow-none btn-sm" name="button">{{ __('Register') }}</button>
        </div>
    </div>
</form>
