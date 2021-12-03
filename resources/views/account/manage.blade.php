@extends('layouts.template')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">Manage Account</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      <li class="active">Manage Account</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
    <div class="cps-section cps-section-padding">
    	@if(session('status'))
            <div class="container">
                <div class="alert alert-info">
                    {{ session('status') }}
                </div>
            </div>
        @endif
        <div class="container">
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6 text-left">
	       <h1>Manage Account</h1>
        </div>
        <div class="col-md-6 text-right mt-10">
            <a href="{{ route('purchase.plan') }}" class="btn btn-primary mt-10">View Plans</a>
        </div>
    </div>
    <ul class="list-group">

        <li class="list-group-item">Status: <strong>{{ $status }}</strong> </li>
        <li class="list-group-item">Current Plan: <strong>{{ $plan }}</strong> </li>
        @if($trial_ends_at)
            <li class="list-group-item">Trial Ends Date: <strong>{{ $trial_ends_at }}</strong> </li>
        @else
            <li class="list-group-item">Current Period Starts: <strong>{{ $startDate }}</strong> </li>
            @if($renews_at)
                <li class="list-group-item">Current Period Renew: <strong>{{ $renews_at }}</strong> </li>
            @endif
            @if($endDate)
                <li class="list-group-item">Current Period End: <strong>{{ $endDate }}</strong> </li>
            @endif
        @endif
        @if($subscribed==true && $user->plan != env('PAYPERREPORT_PACKAGE'))
            <li class="list-group-item">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cancel_subscription" data-href="{{ url('account/cancelSubscription') }}">Click here to cancel your subscriptions</button>
            </li>
        @endif
        
    </ul>
<form action="{{ url('account/updateSubscription') }}" method="post" class="account-form"> {{ csrf_field() }}
    <div class="row">
        <div class="col-sm-6">
        <hr>
        @if(Auth::user()->plan == '')
            <h4 class="section-header"><span>Purchase Your Plan</span></h4>
            <a href="{{ route('purchase.plan') }}" style="margin-top:10px;" class="btn btn-success">Purchase Plan</a>
        @else

            @if(getAvailablePlan()->count() > 0)
            <div class="form-group">
                <h4 class="section-header"><span>Update Your Plan</span></h4>
                <label for="plan" class="control-label">Plan</label>
                <select class="form-control" name="plan">
                    <option value="" selected="selected">- Select Plan -</option>
                    @foreach(getAvailablePlan() as $plan)
                        @if(strpos($plan->planId, Config::get('app.30DayTrialString')) === false)
                            <option value="{{ $plan->planId }}">{{ $plan->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">
                        Update Your Plan
                    </button>
                </div>
            </div>
            @else
            <div class="alert alert-info">
                <p>You can not update plan now.</p>
            </div>
            @endif
        @endif
        
    
    <div class="clearfix"></div>
   
    </div>
    </div>
</form>
<div class="clearfix"></div>

</div>
</div>
</div>
</div>

<div class="modal fade" id="cancel_subscription" tabindex="-1" role="dialog" aria-labelledby="Cancel Subscription">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cancel Subscription</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to cancel your subscription ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" id="confirm_btn">Ok</a>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
        $('#cancel_subscription').on('shown.bs.modal', function(e) {
            console.log($(e.relatedTarget).data('href'));
            $(this).find('#confirm_btn').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>


@endsection