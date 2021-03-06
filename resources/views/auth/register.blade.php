@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">{{__('auth_register.register')}}</h2>
        <ol class="breadcrumb">
            <li><a href="{{ Route('home') }}">{{__('auth_register.home')}}</a></li>
            <li class="active">{{__('auth_register.register')}}</li>
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
            <h2><span>Create My {{ config('app.title') }} {{__('auth_register.account')}}</span></h2>
            @else
            <h2><span>Subscribe My {{ config('app.title') }} {{__('auth_register.account')}}</span></h2>
            @endif -->
                    </div>
                </div>
                <div class="row">
                    <div>
                        <hr>
                        <p class="text-center" style="font-size: 16px;">{{__('auth_register.para1')}} <a href="{{ URL::route('page.coverage') }}">{{__('auth_register.here')}}</a></p>
                        <hr>
                        <!-- <h4><span>{{__('auth_register.basicInformation')}}</span></h4> -->
                    </div>
                </div>

                <form class="account-form form-horizontal" method="POST" action="{{ route('register.user') }}">
                    {{ csrf_field() }}
                    @if (Auth::guest())
                    <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                        <label for="firstName" class="col-md-4 control-label">
                            <p class="text-left">{{__('auth_register.firstName')}}</p>
                        </label>

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
                        <label for="lastName" class="col-md-4 control-label">
                            <p class="text-left">{{__('auth_register.lastName')}}</p>
                        </label>

                        <div class="col-md-6">
                            <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName') }}" required>

                            @if ($errors->has('lastName'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lastName') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <!-- <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title" class="col-md-4 control-label"><p class="text-left">{{__('auth_register.title')}}</p></label>

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
                <label for="region" class="col-md-4 control-label"><p class="text-left">{{__('auth_register.city')}}</p></label>

                <div class="col-md-6">
                    <select class="form-control" id="region" name="region" required >
                        <option value="" selected="selected">{{__('auth_register.selectYourCity')}}</option>
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
                        <label for="email" class="col-md-4 control-label">
                            <p class="text-left">{{__('auth_register.email')}}</p>
                        </label>

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
                        <label for="password" class="col-md-4 control-label">
                            <p class="text-left">{{__('auth_register.password')}}</p>
                        </label>

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
                        <label for="password-confirm" class="col-md-4 control-label">
                            <p class="text-left">{{__('auth_register.confirmPassword')}}</p>
                        </label>

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
                        <label for="referral_code" class="col-md-4 control-label">
                            <p class="text-left">{{__('auth_register.referralCode')}}</p>
                        </label>

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
                <h4 class="section-header"><span>{{__('auth_register.enterYourCreditCardInfo')}}</span></h4></div>
        </div>

        <div class="form-group">
            <label for="card_number" class="col-md-4 control-label"><p class="text-left">{{__('auth_register.cardNumber')}}</p></label>

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
            <label for="card_number" class="col-md-4 control-label"><p class="text-left">{{__('auth_register.expiryMonth')}}</p></label>

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
            <label for="card_number" class="col-md-4 control-label"><p class="text-left">{{__('auth_register.expiryYear')}}</p></label>

            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="2020" data-stripe="exp-year" name="exp-year">
            </div>
        </div>
        <div class="form-group">
            <label for="card_number" class="col-md-4 control-label"><p class="text-left">{{__('auth_register.cvc')}}</p></label>

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
                        <p>{{__('auth_register.para4_1')}} {{ config('app.title') }}{{__('auth_register.para4_2')}} {{ config('app.trial_period') }}{{__('auth_register.para4_3')}} {{ config('app.title') }}{{__('auth_register.para4_4')}}</p>
                        <p>{{__('auth_register.para5_1')}} {{ config('app.trial_period')/2 }} {{__('auth_register.para5_2')}}
                    </div>

                    <div class="form-group">

                        <div class="col-md-12">
                            <input id="agree_term" type="checkbox" value="1" name="agree_term" checked required> {{__('auth_register.para2')}} <a href="{{ url('terms') }}">{{__('auth_register.termsOfService')}}</a> {{__('auth_register.para3')}}
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
                                {{__('auth_register.createAccountNow')}}
                            </button>
                        </div>
                    </div>
                </form>

            </div>

            <div class="col-md-12" style="margin-top: 60px">
                <h4 class="question">{{__('auth_register.questionOne')}}</h4>
                <p>{{__('auth_register.ansOnePartOne')}} {{ config('app.trial_period') }} {{__('auth_register.ansOnePartTwo')}} {{ config('app.trial_period') }} {{__('auth_register.ansOnePartThree')}}</p>
                <h4 class="question">{{__('auth_register.questionTwo')}}</h4>
                <p>{{__('auth_register.ansTwoPartOne')}} {{ config('app.title') }} {{__('auth_register.ansTwoPartTwo')}}</p>
            </div>
        </div>
    </div>
</div>
@endsection