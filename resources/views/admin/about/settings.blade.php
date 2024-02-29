@extends('layouts.admin')
@section('content')
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3 mb-3"><strong>About Us Information</strong></h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card p-3">

                    <form class="m-0 p-0" action="{{ route('settings.update') }}" method="POST">
                        @csrf
                        @method('PATCH')

                        {{-- paystack_test_public_key --}}
                        <div class="form-group">
                            <label for="paystack_test_public_key">Paystack test public key</label>
                            <input type="text" class="form-control" id="paystack_test_public_key" name="paystack_test_public_key"
                                placeholder="Enter paystack_test_public_key" value="{{ old('paystack_test_public_key') ?? $setting->paystack_test_public_key }}">

                            @if ($errors->has('paystack_test_public_key'))
                                <span class="text-danger">{{ $errors->first('paystack_test_public_key') }}</span>
                            @endif
                        </div>
                        {{-- paystack_test_secret_key --}}
                        <div class="form-group">
                            <label for="paystack_test_secret_key">Paystack test secret key</label>
                            <input type="text" class="form-control" id="paystack_test_secret_key" name="paystack_test_secret_key"
                                placeholder="Enter paystack_test_secret_key" value="{{ old('paystack_test_secret_key') ?? $setting->paystack_test_secret_key }}">

                            @if ($errors->has('paystack_test_secret_key'))
                                <span class="text-danger">{{ $errors->first('paystack_test_secret_key') }}</span>
                            @endif
                        </div>
                        {{-- paystack_live_public_key --}}
                        <div class="form-group">
                            <label for="paystack_live_public_key">Paystack live public key</label>
                            <input type="text" class="form-control" id="paystack_live_public_key" name="paystack_live_public_key"
                                placeholder="Enter paystack_live_public_key" value="{{ old('paystack_live_public_key') ?? $setting->paystack_live_public_key }}">

                            @if ($errors->has('paystack_live_public_key'))
                                <span class="text-danger">{{ $errors->first('paystack_live_public_key') }}</span>
                            @endif
                        </div>
                        {{-- paystack_live_secret_key --}}
                        <div class="form-group">
                            <label for="paystack_live_secret_key">Paystack live secret key</label>
                            <input type="text" class="form-control" id="paystack_live_secret_key" name="paystack_live_secret_key"
                                placeholder="Enter paystack_live_secret_key" value="{{ old('paystack_live_secret_key') ?? $setting->paystack_live_secret_key }}">

                            @if ($errors->has('paystack_live_secret_key'))
                                <span class="text-danger">{{ $errors->first('paystack_live_secret_key') }}</span>
                            @endif
                        </div>
                        {{-- facebook --}}
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" class="form-control" id="facebook" name="facebook"
                                placeholder="Enter facebook" value="{{ old('facebook') ?? $setting->facebook }}">

                            @if ($errors->has('facebook'))
                                <span class="text-danger">{{ $errors->first('facebook') }}</span>
                            @endif
                        </div>
                        {{-- twitter --}}
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="text" class="form-control" id="twitter" name="twitter"
                                placeholder="Enter twitter" value="{{ old('twitter') ?? $setting->twitter }}">

                            @if ($errors->has('twitter'))
                                <span class="text-danger">{{ $errors->first('twitter') }}</span>
                            @endif
                        </div>
                        {{-- instagram --}}
                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input type="text" class="form-control" id="instagram" name="instagram"
                                placeholder="Enter instagram" value="{{ old('instagram') ?? $setting->instagram }}">

                            @if ($errors->has('instagram'))
                                <span class="text-danger">{{ $errors->first('instagram') }}</span>
                            @endif
                        </div>
                        {{-- email --}}
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Enter email" value="{{ old('email') ?? $setting->email }}">

                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        {{-- email_2 --}}
                        <div class="form-group">
                            <label for="email_2">Other Email</label>
                            <input type="text" class="form-control" id="email_2" name="email_2"
                                placeholder="Enter email_2" value="{{ old('email_2') ?? $setting->email_2 }}">

                            @if ($errors->has('email_2'))
                                <span class="text-danger">{{ $errors->first('email_2') }}</span>
                            @endif
                        </div>
                        {{-- phone --}}
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="Enter phone" value="{{ old('phone') ?? $setting->phone }}">

                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        {{-- phone_2 --}}
                        <div class="form-group">
                            <label for="phone_2">Other Phone</label>
                            <input type="text" class="form-control" id="phone_2" name="phone_2"
                                placeholder="Enter phone_2" value="{{ old('phone_2') ?? $setting->phone_2 }}">

                            @if ($errors->has('phone_2'))
                                <span class="text-danger">{{ $errors->first('phone_2') }}</span>
                            @endif
                        </div>
                        {{-- address --}}
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Enter address" value="{{ old('address') ?? $setting->address }}">

                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>



                        <button type="submit" class="btn btn-primary">Update</button>

                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
