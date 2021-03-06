<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ env('APP_URL') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <!-- Styles -->
	
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" media="all">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.loadTemplate.min.js') }}"></script>
    <style type="text/css">
        
    /* Show and affix the side nav when space allows it */
    @media (min-width: 992px) {
      .bs-docs-sidebar .nav > .active > ul {
        display: block;
      }
      /* Widen the fixed sidebar */
      .bs-docs-sidebar.affix,
      .bs-docs-sidebar.affix-bottom {
        width: 213px;
      }
      .bs-docs-sidebar.affix {
        position: fixed; /* Undo the static from mobile first approach */
        top: 20px;
      }
      .bs-docs-sidebar.affix-bottom {
        position: absolute; /* Undo the static from mobile first approach */
      }
      .bs-docs-sidebar.affix-bottom .bs-docs-sidenav,
      .bs-docs-sidebar.affix .bs-docs-sidenav {
        margin-top: 0;
        margin-bottom: 0;
      }
    }
    @media (min-width: 1200px) {
      /* Widen the fixed sidebar again */
      .bs-docs-sidebar.affix-bottom,
      .bs-docs-sidebar.affix {
        width: 263px;
      }
    }


    </style>
</head>
<body>
    <div class="container-fluid" style="padding:20px">

        <div class="col-xs-3" id="sidebar">
            <nav class="bs-docs-sidebar affix">
           
                    <ul class="nav nav-pills  nav-stacked bs-docs-sidenav">
                    <li><a href="{{ Route('home') }}"><img src="https://communityfeaturesheet.com/image/cache/catalog/b22701_4a3021c8bf964e0980b68bae5eb82079-586x133.gif"   alt="{{ config('app.name', 'HoodQ') }}" style="width: 100%" /></a></li>

                     @if (Auth::guest())
                            <li><a href="{{ route('login') }}">{{__('layouts_layout.login')}}</a></li>
                            <li><a href="{{ route('register') }}">{{__('layouts_layout.register')}}</a></li>
                        @endif


                        @if(Auth::User())
               <li> <a href="{{ url('/dashboard') }}">{{ Auth::User()->firstName }}</a></li>
            @endif


                        @if(Auth::guest()==false)
                        @if(Request::url()!=url('/home')) 
                          <li>
                            <div class="input-group">
                            <input type="text" class="form-control" id="address" name="address">
                              <span class="input-group-addon" style="cursor: pointer;" id="clearInput">x</span>
                            </div>
                          </li>
                        @endif

                        @yield('nav')

                        <li><a href="{{ url('/account') }}">{{__('layouts_layout.myaccount')}}</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{__('layouts_layout.logout')}}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                    </ul>
                    <ul class="nav nav-pills  nav-stacked bs-docs-sidenav">
                        <li><a href="{{ url('about') }}">{{__('layouts_layout.about')}}</a></li>
                        <li><a href="{{ url('terms') }}">{{__('layouts_layout.termsconditions')}}</a></li>
                    </ul>
</nav>
        </div>
        
        @if(session('status'))
        <div class="col-xs-9">
        <div class="alert alert-info">
          {{ session('status') }}
        </div>
        @yield('content')
        </div>
        @else
        @yield('content')
        @endif
     
     
    </div>
   
	@if(Auth::guest()==false)
    <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('address')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        var place = autocomplete.getPlace();
       

        document.getElementById('address').value=place.formatted_address;
       
        $.ajax({
          dataType:'json',
          type:'post',
          data:'_token={{ csrf_token() }}&long='+place.geometry.location.lng()+'&lat='+place.geometry.location.lat()+'&address='+place.formatted_address,
          url:'{{ url('/generateReport') }}',
          success:function(data){
             location.href='{{ url('/report/highlights') }}/'+data.reportId;
          },
          error:function(data){
              console.log(data);
          }

        });

      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    $('#clearInput').on('click',function(){
        $('#address').val('');
        $('#addressList').html('');

    });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API')}}&libraries=places&callback=initAutocomplete"></script>

    @endif
</body>
</html>
