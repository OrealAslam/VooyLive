@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">Create Report</h2>
    <ol class="breadcrumb">
      <li class="active">Home</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
  <!-- Custom Features -->
    <div class="cps-section cps-section-padding" id="features">
        <div class="container">
      <div class="col-md-12">
        <h1>Create a {{ config('app.title') }}</h1>
        <div class="create_report_main account-form">
            <label for="">Enter Address</label>
            <div class="form-group">
                <input type="text" class="form-control" id="address" name="address">
                <span class="input-group-addon" style="cursor: pointer;" id="clearInput"><span class="btn_txt">x</span><i class="fa fa-spinner fa-spin hide" style="font-size:18px"></i></span>
                <div class="clearfix"></div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection