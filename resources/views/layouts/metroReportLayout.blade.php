<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">

        <title>
            @if(View::hasSection('title'))
                @yield('title')
            @else
                {{config('app.name')}}
            @endif
        </title>

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/metroReport/style.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/metroReport/print.css') }}" rel="stylesheet" media="print" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet'  type='text/css'>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    </head>
    <body>
        @yield('content')

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        @include('layouts.new_footer_script')
    </body>
</html>