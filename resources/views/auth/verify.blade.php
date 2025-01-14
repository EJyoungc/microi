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
                            <h1 class="mb-4 d-flex justify-content-center">Verifi<span class="text-success">cation</span>
                            </h1>
                            <div class="request-form ftco-animate bg-primary p-5 font-weight-bold">
                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                    </div>
                                @endif

                                {{ __('Before proceeding, please check your email for a verification link.') }}
                                {{ __('If you did not receive the email') }},
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-link p-0 m-0 align-baseline text-success">{{ __('click here to request another') }}</button>.
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
