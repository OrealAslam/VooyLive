<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            @if(View::hasSection('title'))
                @yield('title')
            @else
                {{config('app.name')}}
            @endif
        </title>

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">        
        <link href="{{ asset('css/green.css') }}" rel="stylesheet">
        <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">
        <link href="{{ asset('css/swiper.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/plyr.css') }}" rel="stylesheet">
        <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom-style.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans%7CLato:300,400,600,900" rel="stylesheet">
    </head>
    <body class="pink-orange">        
        <!-- Header -->
        <nav class="navbar navbar-default style-2" data-spy="affix" data-offset-top="60">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/"><img src="{{ url('img/top-logo.png')}}" alt="Community Feature Sheet"></a>
                </div>

                <ul class="nav navbar-nav navbar-social navbar-right">
                    <li><a href="https://www.facebook.com/communityfeaturesheet/"><i class="fa fa-facebook"></i></a></li>
                    <!-- <li><a href="https://twitter.com/FeatureSheets"><i class="fa fa-twitter"></i></a></li> -->
                    <li><a href="https://www.instagram.com/communityfeaturesheets/"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/vooy-marketing-inc/"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- Header End -->
        <!-- Banner -->
        <div class="cps-banner style-11 comingsoon-banner" id="banner">
        <!-- Content -->
            @yield('content')
        <!-- Content End -->
            <footer class="comingsoon-footer">
                <div class="cps-footer-lower">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <p class="copyright">Copyright &copy; 2018, VOOY MARKETING INC, All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- Banner End -->

    </body>
</html>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script src="{{ asset('js/visible.js') }}"></script>
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('js/jquery.countTo.js') }}"></script>
<script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('js/plyr.js') }}"></script>
<script src="{{ asset('js/swiper.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/typer.js') }}"></script>
<script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>