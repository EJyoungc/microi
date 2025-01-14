@extends('layouts.public')

@section('content')
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('{{ asset('landing page/images/bg_1.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text justify-content-center align-items-center ">
                <div class="col-lg-6 ftco-animate">
                    <div class="text w-100 mb-md-5 pb-md-5">
                        <div class="text-center">
                            <h1 class="mb-4 d-flex justify-content-center">Regi<span class="text-success">ster</span></h1>
                        </div>

                        <form method="POST" action="{{ route('register') }}"
                            class="request-form ftco-animate bg-primary p-5">
                            @csrf

                            <div class="form-group ">
                                <input id="name" type="text"
                                    class="form-control  @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" placeholder="Enter Name" required autocomplete="name"
                                    autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <input id="email" type="email"
                                    class="form-control  @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="password" type="password"
                                    class="form-control  @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                           <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            </div>

                            <div class="form-group">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
