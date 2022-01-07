@extends('layouts.template')
@section('content')
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
<!-- <style>
   #map {
    height: 400px;
    width: 100%;
   }
</style> -->

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
              <p style="padding: 0px;">{!! getSettingValue('coverage') !!} <strong><a href="{{ route('page.contact-us') }}">Contact Us</a></strong></p>
          </div>
      </div>
    </div>
    <!-- FAQ -->
    <!-- google api = AIzaSyCVK0DvbTLo3EvQ5u3bGlM4gzlK_d6Qjo4-->
    <!-- <div class="cps-section cps-section-padding cps-gradient-bg" id="faq"> -->
        <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <h1 class="text-center">Available Across All Canada</h1>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d22126001.03860246!2d-60.49218744999999!3d70.21585468179032!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4b0d03d337cc6ad9%3A0x9968b72aa2438fa5!2sCanada!5e0!3m2!1sen!2s!4v1641495546071!5m2!1sen!2s" width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
            </div>
            
            
        </div>
    <!-- </div> -->
    <!-- FAQ End -->
    @include('sub_views.getstarted')
</div>
<!--
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVK0DvbTLo3EvQ5u3bGlM4gzlK_d6Qjo4&callback=initMap">
</script>
-->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API')}}&callback=initMap" async defer></script> -->
@endsection
