@extends('layouts.template')
@section('content')

<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">How It Works</h2>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="active">How It Works</li>
        </ol>
    </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
    <!-- FAQ -->
    <!-- google api = AIzaSyCVK0DvbTLo3EvQ5u3bGlM4gzlK_d6Qjo4-->
    <div class="cps-section cps-section-padding cps-gradient-bg" id="faq">
        <div class="container">
          <div class="row">
              <div class="cps-service-boxs">
                  <div class="col-sm-4">
                      <div class="cps-service-box style-7">
                          <div class="cps-service-icon">
                              <span><img src="/img/how-it-works/sign-up.png" height="64px"></span>
                          </div>
                          <h4 class="cps-service-title">Sign Up</h4>
                          <!--
                          <p class="cps-service-text">Develop quality cms theme to enable people build their site within a day</p>
                          <a class="service-more" href="#">Learn More <i class="fa fa-angle-right"></i></a>
                          -->
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="cps-service-box style-7">
                          <div class="cps-service-icon">
                              <span><img src="/img/how-it-works/update-profile.png" height="64px"></span>
                          </div>
                          <h4 class="cps-service-title">Update Profile</h4>
                          <!--
                          <p class="cps-service-text">Take idea from client and convert that idea to a live, bug free and highly secured software</p>
                          <a class="service-more" href="#">Learn More <i class="fa fa-angle-right"></i></a>
                          -->
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="cps-service-box style-7">
                          <div class="cps-service-icon">
                              <span><img src="/img/how-it-works/print-report.png" height="64px"></span>
                          </div>
                          <h4 class="cps-service-title">Print Report</h4>
                          <!--
                          <p class="cps-service-text">Make highly productive apps for multiple mobile device. </p>
                          <a class="service-more" href="#">Learn More <i class="fa fa-angle-right"></i></a>
                          -->
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>


    <!-- How it work video -->
    <div class="cps-section cps-section-padding cps-gradient-round">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-12">
                    <div class="cps-section-header text-center">
                        <h3 class="cps-section-title">How it works</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <a class="play-video big-play-btn" href="https://www.youtube.com/watch?v=YAMcs3DB2Rg"><i class="fa fa-play"></i></a>
            </div>
        </div>
    </div>
    <!-- How it work video end -->
    
    <!-- FAQ End -->
    @include('sub_views.getstarted')
</div>
@endsection