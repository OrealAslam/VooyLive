@extends('layouts.template')

@section('customStyle')
<style type="text/css">
  .fa-check-circle{
    font-size:80px;
    margin-top:25px;
    color:green;
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
    <h2 class="page-title">Successfully Activated</h2>
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}">Home</a></li>
      <li class="active">Successfully Activated</li>
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
            <h3 class="cps-section-title">Successfully Activated</h3>
            <i class="fa fa-check-circle" aria-hidden="true"></i><br>
            <p class="cps-section-text"></p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 text-center sub-text">
            You have successfully activated your account. You can now log in here. <br><a href="{{ route('login') }} " class="btn btn-primary mt-10">Login</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Login end -->
</div>

@endsection
