<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Microi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('landing page/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing page/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('landing page/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing page/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing page/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('landing page/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('landing page/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('landing page/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('landing page/css/jquery.timepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('landing page/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('landing page/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('landing page/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landing page/webfonts/uicons-solid-straight.css') }}">
</head>

<body data-spy="scroll" data-target="#navbar-example2" data-offset="0">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('landing') }}">Micro<span>Eye </span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>


            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="#services" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="{{route('pansika')}}" class="nav-link">Pansika</a></li>
                    {{-- <li class="nav-item"><a href="car.html" class="nav-link">Cars</a></li> --}}
                    <li class="nav-item"><a href="#team" class="nav-link">Team</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item px-1"><a href="{{ route('home') }}" class="btn btn-success">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item"><a href="{{ route('login') }}" class="btn btn-sm btn-outline-success ">Log
                                    in</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item px-1"><a href="{{ route('register') }}"
                                        class="btn btn-sm btn-success">Register</a></li>
                            @endif
                        @endauth
                    @endif

                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2"><a href="#" class="logo">Micro<span>Mek</span></a></h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there
                            live the blind texts.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Information</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">About</a></li>
                            <li><a href="#" class="py-2 d-block">Services</a></li>
                            <li><a href="#" class="py-2 d-block">Term and Conditions</a></li>
                            <li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
                            <li><a href="#" class="py-2 d-block">Privacy &amp; Cookies Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Customer Support</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">FAQ</a></li>
                            <li><a href="#" class="py-2 d-block">Payment Option</a></li>
                            <li><a href="#" class="py-2 d-block">Booking Tips</a></li>
                            <li><a href="#" class="py-2 d-block">How it works</a></li>
                            <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St.
                                        Mountain
                                        View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2
                                            392
                                            3929 210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>Micromek All rights reserved | made by <a href="https://micromek.net"
                            target="_blank">Techlink360</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>

    <script src="{{ asset('landing page/js/jquery.min.js') }}"></script>
    <script src="{{ asset('landing page/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('landing page/js/popper.min.js') }}"></script>
    <script src="{{ asset('landing page/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing page/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('landing page/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('landing page/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('landing page/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('landing page/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('landing page/js/aos.js') }}"></script>
    <script src="{{ asset('landing page/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('landing page/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('landing page/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('landing page/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('landing page/js/google-map.js') }}"></script>
    <script src="{{ asset('landing page/js/main.js') }}"></script>
</body>

</html>
