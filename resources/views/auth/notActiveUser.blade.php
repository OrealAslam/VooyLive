@extends('layouts.template')

@section('customStyle')
<style type="text/css">
  .fa-exclamation-circle{
    font-size:80px;
    margin-top:25px;
    color:red;
  }
  .successfully-box{
    border-top:3px solid #EA2448;
    box-shadow:2px 2px 5px 2px #d2d2d2;
    padding:20px;
  }
  .sub-text{
    font-size:16px;
    margin-top:-30px;
  }
</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">Not Activated</h2>
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}">Home</a></li>
      <li class="active">Not Activated</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
  <!-- Custom Features -->
    <div class="cps-section cps-section-padding" id="features">
        <div class="container successfully-box">
      <div class="row">
        <div class="col-md-10 col-md-offset-1 col-xs-12">
          <div class="cps-section-header text-center">
            <h3 class="cps-section-title">Not Activated</h3>
            <i class="fa fa-exclamation-circle" aria-hidden="true"></i><br>
            <p class="cps-section-text"></p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 text-center sub-text">
            You are not active, Please contact your administrator.
        </div>
      </div>
    </div>
  </div>
  <!-- Login end -->
</div>

@endsection
