@extends('layouts.guest')
@section('content')
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Welcome back</h1>
                        <p class="lead">
                            Don't have an account? <a href="{{ route('login') }}">Login</a>
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <div class="text-center">
                                    <img src="{{ asset('assets/img/docs/nunya.png') }}" alt="Nunya"
                                        class="img-fluid img-fit rounded-circle" width="132" height="132" />
                                </div>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    {{-- name --}}
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('Name') }}</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter your name" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input
                                        class="form-control form-control-lg"
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="Enter your email" />
                                        @if ($errors->has('email'))
                                            <strong style="color: red">{{ $errors->first('email') }}</strong>
                                        @endif
                                    </div>

                                    <!-- password -->
                                    <div class="mb-3">
                                        <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Choose a password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <!-- confirm password -->
                                        <div class="form-group">
                                        <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Repeat password" autocomplete="new-password">
                                        </div>



                                    <div class="text-center mt-3">
                                        <button class="btn btn-lg btn-primary">Sign in</button>
                                        <!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
