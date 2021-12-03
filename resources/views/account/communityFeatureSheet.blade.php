@extends('layouts.template')

@section('customStyle')
    <style type="text/css">
        .disable-box{
            pointer-events: none;
            opacity: 0.4;
        }        
    </style>
@endsection

@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">Create Community Feature Sheet®</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      <li class="active">My Community Feature Sheet®</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
  <!-- Custom Features -->
    <div class="cps-section cps-section-padding" id="features">
        <div class="container">
            <div class="col-md-12">
                @if(!empty($user['plan']) || checkPlan(Auth::User()->parent_id))
                    <h1>Create a {{ config('app.title') }}</h1>
                    <div class="create_report_main account-form">
                        <label for="">Enter Address</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="address" name="address">
                            <span class="input-group-addon" style="cursor: pointer;" id="clearInput"><span class="btn_txt">x</span><i class="fa fa-spinner fa-spin hide" style="font-size:18px"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                @else
                    <div class="disable-box">
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
                    <div class="col-md-10 col-md-offset-1  text-center purchase-plan-box purchase-plan">
                        <h5>You need an active plan or subscription to run reports</h5>
                        <a href="{{ route('purchase.plan') }}" class="btn btn-success">Select Plan</a>
                    </div>
                @endif
            </div>
        </div>
  </div>
</div>
@endsection

@section('footer_script')
<script type="text/javascript">
    document.addEventListener('contextmenu', function(e) {
      e.preventDefault();
    });
</script>
@endsection