@extends('layouts.template')
@section('content')
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
<style>
   #map {
    height: 400px;
    width: 100%;
   }
</style>

<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">Coverage</h2>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="active">Coverage</li>
        </ol>
    </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap mp-10" style="margin-top: 10px;">
    <div class="container">
      <div class="row">
          <div class="col-md-12" align="center">
              <p style="padding: 0px;">{!! getSettingValue('coverage') !!} </p>
          </div>
      </div>
    </div>
    <!-- FAQ -->
    <!-- google api = AIzaSyCVK0DvbTLo3EvQ5u3bGlM4gzlK_d6Qjo4-->
    <div class="cps-section cps-section-padding cps-gradient-bg" id="faq">
        <div class="container">
            <div class="row">
              <div class="col-md-12">
                <img src="{{env('APP_URL')}}/img/map-marker/green-marker-black-border-th.png" class="covrage" alt="" width="32">
                Completed Projects
                <img src="{{env('APP_URL')}}/img/map-marker/yellow-marker-black-border-th.png" class="covrage" alt="" width="32">
                Working Projects
                <img src="{{env('APP_URL')}}/img/map-marker/orange-marker-black-border-th.png" class="covrage" alt="" width="32">
                Future Projects
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                 <div id="map"></div>
              </div>
            </div>
            <script>
              var map;
              var canada = {lat: 54.7228629, lng: -113.7211583};
              var edmonton = {lat: 53.544389, lng: -113.4909267};
              var mapCenter = {lat: 49, lng: -101};

              var locations = [
              /* test */
                            {name : 'Edmonton', lat: 53.544389, lng: -113.4909267, type: 'green', content: '<p>Edmonton - Completed Projects</p>'},
                            {name : 'Calgary', lat: 51.0486151, lng: -114.0708459, type: 'green', content: '<p>Calgary - Completed Projects</p>'},
                            {name : 'Vancouver', lat: 49.25, lng: -123.1, type: 'green', content: '<p>Vancouver - Completed Projects</p>'},
                            {name : 'Toronto', lat: 43.7, lng: -79.4, type: 'green', content: '<p>Toronto - Completed Projects</p>'},
                            {name : 'Oshawa', lat: 43.89706189, lng: -78.86576546, type: 'orange', content: '<p>Oshawa - Future Projects</p>'},
              
              /* lite */
              /*
                            {name : 'Edmonton', lat: 53.544389, lng: -113.4909267, type: 'green', content: '<p>Edmonton - Completed Projects</p>'},
                            {name : 'Calgary', lat: 51.0486151, lng: -114.0708459, type: 'green', content: '<p>Calgary - Completed Projects</p>'},
                            {name : 'Vancouver', lat: 49.25, lng: -123.1, type: 'yellow', content: '<p>Vancouver - Working Projects</p>'},
                            {name : 'Toronto', lat: 43.7, lng: -79.4, type: 'yellow', content: '<p>Toronto - Working Projects</p>'},
                            {name : 'Oshawa', lat: 43.89706189, lng: -78.86576546, type: 'orange', content: '<p>Oshawa - Future Projects</p>'},
              */


                            ];

              function loadCoverageMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                  center: mapCenter,
                  zoom: 5
                });

                var iconBase = "{{env('APP_URL')}}/img/map-marker/";
                var icons = {
                  green: {
                    icon: iconBase + 'green-marker-black-border-th.png'
                  },
                  yellow: {
                    icon: iconBase + 'yellow-marker-black-border-th.png'
                  },
                  orange: {
                    icon: iconBase + 'orange-marker-black-border-th.png'
                  }
                };


                var infowindow = new google.maps.InfoWindow();
                var marker, i;
                for (i = 0; i < locations.length; i++) {  
                    marker = new google.maps.Marker({ 
                        position: new google.maps.LatLng(locations[i]['lat'], locations[i]['lng']), 
                        map: map ,
                        icon: icons[locations[i]['type']].icon,
                        mapTypeId: 'satellite',
                        title: locations[i]['name']
                    });
                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            infowindow.setContent(locations[i]['content']);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }
            }
            </script>
        </div>
    </div>
    <!-- FAQ End -->
    @include('sub_views.getstarted')
</div>
<!--
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVK0DvbTLo3EvQ5u3bGlM4gzlK_d6Qjo4&callback=initMap">
</script>
-->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API')}}&callback=initMap" async defer></script> -->
@endsection
