@php
    $name = old('first_name');
    if(empty($name) && Auth::check()){
        $name = Auth::user()->name;
    }
    $phone = old('phone');
    if(empty($phone) && Auth::check()){
        $phone = Auth::user()->phone;
    }
    $address = old('address');
    if(empty($address) && Auth::check()){
        $address = Auth::user()->address;
    }
@endphp

<!-- Buyer Info -->
<h4>Billing Details</h4>
<div class="row">
    <div class="form-group col-xl-6">
        <label>First Name <span class="text-danger">*</span></label>
        <input type="text"
               placeholder="First Name"
               name="first_name"
               class="form-control @error('first_name') is-invalid @enderror"
               value="{{ $name }}"
               required>
    </div>
    <div class="form-group col-xl-6">
        <label>Last Name</label>
        <input type="text"
               placeholder="Last Name"
               name="last_name"
               class="form-control @error('last_name') is-invalid @enderror"
               value="{{old('last_name')}}">
    </div>
    @error('first_name')
    <div class="form-group col-xl-12">{{ $message }}</div>
    @enderror
    @error('last_name')
    <div class="form-group col-xl-12">{{ $message }}</div>
    @enderror
    <div class="form-group col-xl-12">
        <label>Address <span class="text-danger">*</span></label>
        <input type="text"
               placeholder="Town\Street"
               name="address"
               class="form-control @error('address') is-invalid @enderror"
               value="{{$address}}"
               required="">
    </div>
    @error('address')
    <div class="form-group col-xl-12">{{ $message }}</div>
    @enderror
    <div class="form-group col-xl-6">
        <label>Phone Number <span class="text-danger">*</span></label>
        <input type="text"
               placeholder="897654321"
               name="phone"
               class="form-control"
               value="{{ $phone }}"
               required="">
    </div>
    <div class="form-group col-xl-6">
        <label>Select currency</label>
        <div class="customize-variation-item">
            <div class="custom-control custom-radio">
                <input type="radio"
                       @if(Session::get('currency','euro')==='euro')
                       checked
                       @endif
                       value="euro"
                       id="euro"
                       name="currency"
                       class="custom-control-input">
                <label class="custom-control-label" for="euro">Euro</label>
            </div>
        </div>
        <div class="customize-variation-item">
            <div class="custom-control custom-radio">
                <input type="radio"
                       @if(Session::get('currency','euro')==='usd')
                       checked
                       @endif
                       id="usd"
                       value="usd"
                       name="currency"
                       class="custom-control-input">
                <label class="custom-control-label" for="usd">USD</label>
            </div>
        </div>
    </div>

    @error('phone')
    <div class="form-group col-xl-12">{{ $message }}</div>
    @enderror
    @error('currency')
    <div class="form-group col-xl-12">{{ $message }}</div>
    @enderror

    <div class="form-group col-xl-12 mb-0">
        <label>Order Notes</label>
        <textarea name="comment"
                  rows="5"
                  class="form-control"
                  placeholder="Order Notes (Optional)">{{old('comment')}}</textarea>
    </div>
</div>

<!-- /Buyer Info -->
