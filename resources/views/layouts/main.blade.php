<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                margin: 0;
            }

            .full-height {
                height: 60px;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
<div class="top-right links">
            <a href="{{ Route('home') }}">Home</a>
            <a href="{{ url('/about') }}">About</a>
            <a href="{{ url('/productdetail') }}">Product Details</a>
            <a href="{{ url('/faqs') }}">FAQs</a>
            <a href="{{ url('/termsconditions') }}">Terms & Conditions</a>
            <a href="{{ url('/pricing') }}">{{ config('app.trial_period')}} Days Free</a>
            @if(Auth::User())
            <a href="{{ url('/dashboard') }}">{{Auth::user()->firstName.' '.Auth::user()->lastName}}</a>
            @else            
            <a href="{{ url('/login') }}">Signin</a>
            <a href="{{ url('/register') }}">Register</a>          
            @endif
              </div>

            
        </div>
        <div class="container">
        <div class="content">
               @yield('content')
        </div>
        </div>
    </body>
</html>
