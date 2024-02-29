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
                                <form method="POST" action="{{ route('password.store') }}">
                                    @csrf

                                    <!-- Password Reset Token -->
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                    <!-- Email Address -->
                                    <div>
                                        <label for="email" :value="__('Email')">Email</label>
                                        <input id="email" class="block mt-1 w-full form-control" type="email"
                                            name="email" value="{{ old('email', $request->email) }}" required autofocus
                                            readonly />
                                    </div>

                                    <!-- Password -->
                                    <div class="mt-4">
                                        <label for="password" :value="__('Password')">Password</label>
                                        <input id="password" class="block mt-1 w-full" type="password" name="password"
                                            required autocomplete="new-password" />
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="mt-4">
                                        <label for="password_confirmation" :value="__('Confirm Password')">Confirm
                                            Password</label>
                                        <input id="password_confirmation" class="block mt-1 w-full" type="password"
                                            name="password_confirmation" required />
                                    </div>

                                    <div class="flex items-center justify-end mt-4" style="margin-top: 20px">
                                        <button type="submit" class="ml-4">
                                            {{ __('Reset Password') }}
                                        </button>
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
