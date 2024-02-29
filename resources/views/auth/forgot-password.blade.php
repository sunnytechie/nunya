@extends('layouts.guest')
@section('content')
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Welcome back</h1>
                        <p class="lead">
                            Don't have an account? <a href="{{ route('register') }}">Register</a>
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <div class="text-center">
                                    <img src="{{ asset('assets/img/docs/nunya.png') }}" alt="Nunya"
                                        class="img-fluid img-fit rounded-circle" width="132" height="132" />
                                </div>
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf


                                    <div class="my-3">
                                        {{-- <label class="form-label">Email</label> --}}
                                        <input
                                        class="form-control form-control-lg"
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="Enter your email" />
                                        @if ($errors->has('email'))
                                            <strong style="color: red">{{ $errors->first('email') }}</strong>
                                        @endif

                                        @if (session('status'))
                                        <strong style="color: red" class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </strong>
                                        @endif
                                    </div>

                                    <div class="text-center mt-3">
                                        <button class="btn btn-lg btn-primary">Email Password Reset Link</button>
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
