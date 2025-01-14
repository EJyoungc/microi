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
                            <h1 class="mb-4 d-flex justify-content-center">Log <span class="text-success">in</span></h1>
                        </div>

                        <form method="POST" action="{{ route('login') }}" class="request-form ftco-animate bg-primary p-5">
                            @csrf

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
                                    autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 ">
                                <div class="form-check">
                                    <input class="form-check-input p-1" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 ">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-dark" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
