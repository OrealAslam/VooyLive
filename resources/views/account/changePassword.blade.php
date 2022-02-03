@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">{{__('account/changePassword.changePassword')}}</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">{{__('account/changePassword.home_')}}</a></li>
      <li><a href="{{ Route('dashboard') }}">{{__('account/changePassword.dashboard')}}</a></li>
      <li class="active">{{__('account/changePassword.changePassword')}}</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
    <div class="cps-section cps-section-padding">
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    @if(isset($message))
                        <div class="col-md-12">
                            <div class="alert alert-{{$messageType}} alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{$message}}
                            </div>
                        </div>
                    @endif
                    @if (count($errors) > 0)
                      <div class="col-md-12">
                        <div class="alert alert-danger">
                            <strong>{{__('account/changePassword.whoops')}}</strong>{{__('account/changePassword.para1')}}<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                      </div>
                    @endif
                        <div class="form-part">
                            <h2><span>{{__('account/changePassword.changePassword')}}</span></h2>
                            <div class="confirm-form">
                                <form class="account-form" role="form" method="POST" action="{{url('account/password')}}">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="current_password" class="col-md-3 control-label">{{__('account/changePassword.currentPassword')}}<span>*</span></label>
                                        <div class="col-md-9">
                                            <input id="current_password" type="password" class="form-control" name="current_password" value="" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="col-md-3 control-label">{{__('account/changePassword.newPassword')}}<span>*</span></label>
                                        <div class="col-md-9">
                                            <input id="password" type="password" class="form-control" name="password" value="" required  >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation" class="col-md-3 control-label">{{__('account/changePassword.confirm')}}<span>*</span></label>
                                        <div class="col-md-9">
                                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-9 col-md-offset-3">
                                            <button type="submit" class="btn btn-primary">
                                                {{__('account/changePassword.submit')}}
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
