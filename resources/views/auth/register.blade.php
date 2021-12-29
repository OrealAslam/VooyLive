@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">Register</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li class="active">Register</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
  <!-- Custom Features -->
    <div class="cps-section cps-section-padding" id="features">
        <div class="container">
<div class="col-md-12">
    <div class="row">
        <div class="col-xs-12">
            <!-- @if (Auth::guest())
            <h2><span>Create My {{ config('app.title') }} Account</span></h2>
            @else
            <h2><span>Subscribe My {{ config('app.title') }} Account</span></h2>
            @endif -->
        </div>
    </div>
    <div class="row">
        <div>
            <hr>
            <p class="text-center" style="font-size: 16px;">Automated Community Feature Sheets® are only available for Canada currently. However, we are making out way to more countries. Check out our current projects <a href="{{ URL::route('page.coverage') }}">here</a></p>
            <hr>
            <!-- <h4><span>Basic Information</span></h4> -->
        </div>
    </div>

    <form class="account-form form-horizontal" method="POST" action="{{ route('register.user') }}">
        {{ csrf_field() }}
        @if (Auth::guest())
            <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                <label for="firstName" class="col-md-4 control-label"><p class="text-left">First Name</p></label>

                <div class="col-md-6">
                    <input id="firstName" type="text" class="form-control" name="firstName" value="{{ old('firstName') }}" required autofocus>

                    @if ($errors->has('firstName'))
                        <span class="help-block">
                            <strong>{{ $errors->first('firstName') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                <label for="lastName" class="col-md-4 control-label"><p class="text-left">Last Name</p></label>

                <div class="col-md-6">
                    <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName') }}" required >

                    @if ($errors->has('lastName'))
                        <span class="help-block">
                            <strong>{{ $errors->first('lastName') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <!-- <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title" class="col-md-4 control-label"><p class="text-left">Title</p></label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required >

                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div> -->


            <!-- <div class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">
                <label for="region" class="col-md-4 control-label"><p class="text-left">City</p></label>

                <div class="col-md-6">
                    <select class="form-control" id="region" name="region" required >
                        <option value="" selected="selected">--- Select Your City ---</option>
                        @foreach(App\City::where('status',1)->get() as $city)
                        <option value="{{ $city->id }}">{{$city->Province->name}} - {{$city->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('region'))
                        <span class="help-block">
                            <strong>{{ $errors->first('region') }}</strong>
                        </span>
                    @endif
                </div>
            </div> -->

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label"><p class="text-left">Email</p></label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label"><p class="text-left">Password</p></label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label"><p class="text-left">Confirm Password</p></label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        @endif

        <div class="form-group{{ $errors->has('referral_code') ? ' has-error' : '' }}">
            <label for="referral_code" class="col-md-4 control-label"><p class="text-left">Referral Code</p></label>

            <div class="col-md-6">
                <input id="referral_code" type="text" class="form-control" name="referral_code" value="{{ (app('request')->input('referral_code')) ? app('request')->input('referral_code') : old('referral_code') }}">

                @if ($errors->has('referral_code'))
                    <span class="help-block">
                        <strong>{{ $errors->first('referral_code') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-xs-12">
                <h4 class="section-header"><span>Enter Your Credit Card Info</span></h4></div>
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
        <div class="stripe-errors"></div> -->

        <div class="col-xs-12 well">
            <p>If you select a {{ config('app.title') }} Plan, it will begin at the end of your free {{ config('app.trial_period') }}-day trial. If you don't wish to continue using {{ config('app.title') }}, just cancel before your free trial ends and you will not be charged. If have have not selected one, you will be able to run reports on the fly as Pay As You Go.</p>
            <p>We will remind you {{ config('app.trial_period')/2 }} days before your trial ends so you have an uninterrupted service. You can cancel your subscription at any time, simply by clicking a link in your account settings. If you cancel, no future subscription charges will be made, although any previous transactions are non-refundable.
        </div>

        <div class="form-group">

            <div class="col-md-12">
                <input id="agree_term" type="checkbox"  value="1" name="agree_term" checked required> I have read and understood these <a href="{{ url('terms') }}">Terms of Service</a> and agree to be bound by them.
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
                    Create Account Now
                </button>
            </div>
        </div>
    </form>
               
</div>

<div class="col-md-12" style="margin-top: 60px">
    <h4 class="_2osCrSJxo8pi2UPOHqJSXF"><span>How does the free trial work?</span></h4><p><span>Your first {{ config('app.trial_period') }} days are FREE and you can create an unlimited number of reports. After {{ config('app.trial_period') }} days, you'll be charged according to the plan you selected, unless you cancel before the end of the trial period.</span></p><h4 class="question"><span>Can I cancel my subscription?</span></h4><p><span>Yes, you can cancel your account and no future charges will be made. You will still have access to create {{ config('app.title') }} reports until the end of your billing cycle, according to the plan you selected.</span></p>
</div>
    </div>
</div>
</div>
@endsection
