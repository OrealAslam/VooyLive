@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">Create Plan</h2>
        <ol class="breadcrumb">
            <li><a href="{{ Route('home') }}">Home</a></li>
            <li class="active">Create Plan</li>
        </ol>
    </div>
</div>
<!-- Page Header End -->
 <div class="cps-main-wrap">

    <!-- Pricing Table -->
    <div class="cps-section cps-section-padding cps-gray-bg" id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-12">
                    <div class="cps-section-header text-center">
                        <h3 class="cps-section-title">Create Plan</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <form id="subscribe-form" class="account-form form-horizontal" method="POST" action="{{ url('subscribe') }}">
                    {{ csrf_field() }}
                    @if(getAvailablePlan()->count() > 0)
                    <div class="form-group">
                        <label for="plan" class="col-md-4 control-label"><p class="text-left">Plan</p></label>
                        <div class="col-md-6">
                        <select class="form-control" name="plan">
                            <option value="" selected="selected">- Select Plan -</option>
                            @foreach(getAvailablePlan() as $plan)
                                @if(strpos($plan->planId, Config::get('app.30DayTrialString')) === false)
                                    <option value="{{ $plan->planId }}" {{ request()->get('plan') == $plan->planId ?  'selected':'' }}  >{{ $plan->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        </div>
                    </div>
                    @endif
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <h4 class="section-header"><span>Enter Your Credit Card Info</span></h4>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="card_number" class="col-md-4 control-label"><p class="text-left">Card Number</p></label>

                        <div class="col-md-6">
                            <input id="card_number" type="text" class="form-control" data-stripe="number" name="card_number" >
                            @if ($errors->has('card_number'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('card_number') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="card_number" class="col-md-4 control-label"><p class="text-left">Expiry Month</p></label>
                        <div class="col-md-6">
                            <select  class="form-control"  data-stripe="exp-month">
                                <option value="01">January</option>
                                <option value="02">February </option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="expiration-date" >
                        <label for="card_number" class="col-md-4 control-label"><p class="text-left">Expiry Year</p></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="2020" data-stripe="exp-year" name="exp-year">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="card_number" class="col-md-4 control-label"><p class="text-left">CVC</p></label>
                        <div class="col-md-6">
                            <input id="cvc" type="text" class="form-control"  data-stripe="cvc" name="cvc">
                            @if ($errors->has('cvc'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cvc') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="stripe-errors"></div>
                    <div class="col-xs-12 well">
                        <p>If you select a {{ config('app.title') }} Plan, it will begin at the end of your free {{ config('app.trial_period') }}-day trial. If you don't wish to continue using {{ config('app.title') }}, just cancel before your free trial ends and you will not be charged. If have have not selected one, you will be able to run reports on the fly as Pay As You Go.</p>
                        <p>We will remind you {{ config('app.trial_period')/2 }} days before your trial ends so you have an uninterrupted service. You can cancel your subscription at any time, simply by clicking a link in your account settings. If you cancel, no future subscription charges will be made, although any previous transactions are non-refundable.
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="agree_term" type="checkbox"  value="1" name="agree_term" required> I have read and understood these <a href="{{ url('terms') }}">Terms of Service</a> and agree to be bound by them.
                            @if ($errors->has('agree_term'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('agree_term') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger adnan">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Subscribe
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Pricing Table End -->
</div>
@endsection
@section('footer_script')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    Stripe.setPublishableKey("{{ env('STRIPE_PUBLISHABLE_SECRET') }}");
</script>
<script>
$(document).ready(function() {

  // target the form
  // on form submission, create a token
  $('#subscribe-form').submit(function(e) {
    var form = $(this);
    // disable the form button
    form.find('button').prop('disabled', true);

    Stripe.card.createToken(form, function(status, response) {
      if (response.error) {
        form.find('.stripe-errors').text(response.error.message).addClass('alert alert-danger');
        form.find('button').prop('disabled', false);
      } else {

        // append the token to the form
        form.append($('<input type="hidden" name="cc_token">').val(response.id));

        // submit the form
        form.get(0).submit();
      }
    });

    e.preventDefault();
  });

});
</script>

@endsection