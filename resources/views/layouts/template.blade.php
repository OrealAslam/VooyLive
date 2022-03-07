<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
        <meta property="og:type" content="website">
        @if(isset($og_source))
        <meta property="og:image" content="{{ asset($og_source) }}">
        @else
        <meta property="og:image" content="{{ asset('upload/productImageSetting/'.getSettingValue('survey-share-image')) }}">
        @endif
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="_token" content="{{ csrf_token() }}">

        <title>
            @if(View::hasSection('title'))
                @yield('title')
            @else
                {!! getSettingValue('meta-deta-name') !!}
            @endif
        </title>

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('newPlugin/bootstrap-colorpicker.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" media="screen">        
        <link href="{{ asset('css/green.css') }}" rel="stylesheet">
        <!-- <link href="{{ asset('css/primary.css') }}" rel="stylesheet"> -->
        <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">
        <link href="{{ asset('css/swiper.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/plyr.css') }}" rel="stylesheet">
        <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap-toggle.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom-style.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/orderDesignPage.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/customTheme.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/jssocials-theme-minima.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/jssocials.css') }}">
        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,600,700,800,900" rel="stylesheet" type='text/css'>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans%7CLato:300,400,600,900" rel="stylesheet">
        @yield('customStyle')


    </head>
    <body class="green">        
        <!-- Header -->
        <nav class="navbar navbar-default style-9 navbar-transparent" data-spy="affix" data-offset-top="60">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                        <span class="sr-only">{{__('layouts_template.toggleNavigation')}}</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> 
                    <a class="navbar-brand" href="/">
                        <img src="{{ url('img/dharro.png')}}" style="padding-left: 20px" class="logo-header-menu" alt="Community Feature Sheet&reg;">
                    </a>                   
                </div>

                <div class="collapse navbar-collapse" id="navbar-collapse">
                    @include('layouts.menu')
                </div>
                <div class="checkbox-header" style="display:{{ !empty(session('cart')) ? 'block' : 'none' }}">
                    <ul class="text-right cart-button-head">
                        <li>
                            <a><span class="quantity"></span> item(s) - $ <span class="total"></span> <i class="fa fa-shopping-cart"></i></a>
                        </li>
                        <div class="append-data-cart">
                                
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header End -->
        <!-- Content -->
            @yield('content')
        <!-- Content End -->
        <!-- Footer -->
        <section class="cookie-bar">
            <div class="cookie-notice container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <p class="cookie-para">{{__('layouts_template.para1')}} <a href="{{ url('/privacy')}}" target="_blank">{{__('layouts_template.cookiePolicy')}}</a></p>
                    </div>
                    <div class="col-md-2">
                        <a href="javascript:;" class="btn btn-primary cookie-btn-accept">{{__('layouts_template.acceptCookies')}}</a>
                    </div>
                </div>
            </div>
        </section>
        <a id="button-scroll"></a>
        <footer class="style-5">
            @include('layouts.footer')
        </footer>
        <!-- Footer End -->

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="/newPlugin/bootstrap-colorpicker.js"></script>
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
<script src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/jssocials.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/df-number-format/2.1.6/jquery.number.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

{!! getSettingValue('google-analytics-space') !!}



@include('layouts.footer_script')
<script>
$("#region").select2( {
    placeholder: "--- Select Your City ---",
    allowClear: true
} );
</script>
<script type="text/javascript">
    var token = $('meta[name="_token"]').attr('content');
</script>
<script type="text/javascript">
    $(document).ready(function(e){
        var type = 'get-cart';
        $.ajax({
            url: '{{ route("add-to-cart") }}',
            method: 'POST',
            data: {_token:token,type:type},
            success: function(data) {
                var count = data.total;
                $('.append-data-cart').html(data.ajaxView);
                $('.cart-button-head').find('li a .quantity').html(data.quantity);
                $('.cart-button-head').find('li a .total').html($.number(count,2));
                $('.count-total').find('p b').html('$'+$.number(data.subTotal,2));
                $('.gst').find('p b').html(data.gst);
                $('.count-total-Price').find('p b').html('$'+$.number(data.total,2));
            }
        });
    });
</script>
<script type="text/javascript">
    $('body').on('click', '.delete-cart', function() {
        var delete_id = $(this).attr('data-id');
        $.ajax({
            url: '{{ route("delete-to-cart") }}',
            method: 'POST',
            data: {_token:token,delete_id:delete_id},
            success: function(data) {
                window.location.reload();
            }
        });
    });
</script>
<script type="text/javascript">
    var btn = $('#button-scroll');

    $(window).scroll(function() {
      if ($(window).scrollTop() > 300) {
        btn.addClass('show');
      } else {
        btn.removeClass('show');
      }
    });

    btn.on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({scrollTop:0}, '300');
    });

</script>
<script type="text/javascript">
    $(document).ready(function () {
        if (readCookie("cookie_accepted") == "1") {
        $(".cookie-bar").hide();
    }else{
        $(".cookie-bar").show();
            $("body").addClass("cookie-space");
            $(".cookie-btn-accept").click(function () {
                $("body").removeClass("cookie-space");
                $(".cookie-bar").fadeOut();
                createCookie("cookie_accepted", 1, 365);
            });
        }
    });

    function getParameterByName(name, url) {
        if (!url) {
            url = window.location.href;
        }
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return "";
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    function createCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
        expires = "; expires=" + date.toUTCString();
    }
        document.cookie = name + "=" + value + expires + "; path=/";
    }

    function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(";");
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == " ") c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
        return null;
    }

    function eraseCookie(name) {
        createCookie(name, "", -1);
    }

    $(document).ready(function () {
    var advMedium = getParameterByName("advm");
    if (advMedium != null) {
    $("input[name=advm]").val(advMedium);
    createCookie("advm", advMedium, 1);
    } else {
        advMedium = readCookie("advm");
        $("input[name=advm]").val(advMedium);
    }
    var nodeCount = document.getElementsByName("ft").length;
    for (count = 0; count < nodeCount; count++) {
    document.getElementsByName("ft")[count].value = window.location.href;
    }
});
</script>
@yield('footer_script')
    </body>
</html>