@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">{{__('auth_login.login')}}</h2>
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}">{{__('auth_login.home')}}</a></li>
      <li class="active">{{__('auth_login.login')}}</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
  <!-- Custom Features -->
    <div class="cps-section cps-section-padding" id="features">
        <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1 col-xs-12">
          <div class="cps-section-header text-center">
            <h3 class="cps-section-title">{{__('auth_login.enterYourAccountInfo')}}</h3>
            <p class="cps-section-text"></p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
          <form class="account-form" method="POST" action="{{ route('login') }}">
          <input type="hidden" name="orderCredit" value="{{ Request::input('type') }}">
          {{ csrf_field() }}
          @if(session('success_msg'))
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{session('success_msg')}}
            </div>
          @endif
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <input id="email" type="email" placeholder="{{__('auth_login.enterEmail')}}" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
              @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <input id="password" type="password" placeholder="{{__('auth_login.enterPassword')}}" class="form-control" name="password" required>
              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
              <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{__('auth_login.rememberMe')}}</label>
            </div>
            <div class="form-group">
              <button type="submit">{{__('auth_login.login')}}</button>
            </div>
            <div class="form-group">
              <a class="btn btn-link" href="{{ route('password.request') }}">{{__('auth_login.forgotYourPassword')}}</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Login end -->
</div>

@endsection
