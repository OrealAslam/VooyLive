@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">About</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li class="active">About</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->

<div class="cps-main-wrap">
  <div id="cps-service" class="cps-section cps-section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1 col-xs-12">
          <div class="cps-section-header text-center">
              {!! getSettingValue('about-us') !!}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Fun fact -->
  <div class="cps-section cps-image-bg-1 parallax" id="fun-fact" data-stellar-background-ratio="0.5">
      <div class="cps-overlay cps-section-padding">
          <div class="container">
              <div class="row">
                  <div class="cps-counter-items">
                      <div class="col-sm-4 col-xs-6">
                          <div class="cps-counter-item">
                              <div class="cps-counter-icon">
                                  <span class="ti-user"></span>
                              </div>
                              <h3 class="cps-fact-number"><span class="cps-count" data-form="0" data-to="800"></span></h3>
                              <p class="cps-fact-name">Clients</p>
                          </div>
                      </div>
                      <div class="col-sm-4 col-xs-6">
                          <div class="cps-counter-item">
                              <div class="cps-counter-icon">
                                  <span class="ti-layers-alt"></span>
                              </div>
                              <h3 class="cps-fact-number"><span class="cps-count" data-form="0" data-to="4"></span></h3>
                              <p class="cps-fact-name">Products</p>
                          </div>
                      </div>
                      <div class="col-sm-4 col-xs-6">
                          <div class="cps-counter-item">
                              <div class="cps-counter-icon">
                                  <span class="ti-shopping-cart-full"></span>
                              </div>
                              <h3 class="cps-fact-number"><span class="cps-count" data-form="0" data-to="3000"</span></h3>
                              <p class="cps-fact-name">Created</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Fun fact end -->
  @include('sub_views.getstarted')

</div>
@endsection