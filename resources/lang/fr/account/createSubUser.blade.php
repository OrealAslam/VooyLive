@extends('layouts.template')

@section('customStyle')
<style type="text/css">
	input{
		border:1px solid #d2d2d2 !important;
	}
</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">Create Sub User</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li class="active">Create Sub User</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->

<div class="cps-main-wrap">
  	<div id="cps-service" class="cps-section cps-section-padding">
    	<div class="container">
	      	<div class="row">
		        <div class="col-md-8 col-md-offset-2 col-xs-12">
		          	<form class="form" method="post" action="{{ route('create.new.user.register') }}"> 
		          		{{ csrf_field() }}
		          		<div class="row">
			                <div class="col-md-6 mt-10">
			          			<label for="email" class="col-md-12 control-label"><p class="text-left">Email</p></label>
			                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
			                    @if ($errors->has('email'))
			                        <span class="help-block">
			                            <strong>{{ $errors->first('email') }}</strong>
			                        </span>
			                    @endif
			                </div>
		          		</div>
		          		<div class="row">
			                <div class="col-md-6 mt-10">
			          			<label for="firstName" class="col-md-12 control-label"><p class="text-left">First Name</p></label>
			                    <input id="firstName" type="text" class="form-control" name="firstName" value="{{ old('firstName') }}" required autofocus>
			                    @if ($errors->has('firstName'))
			                        <span class="help-block">
			                            <strong>{{ $errors->first('firstName') }}</strong>
			                        </span>
			                    @endif
			                </div>
			                <div class="col-md-6 mt-10">
			          			<label for="lastname" class="col-md-12 control-label"><p class="text-left">Last Name</p></label>
			                    <input id="lastname" type="text" class="form-control" name="lastName" value="{{ old('lastName') }}" required autofocus>
			                    @if ($errors->has('lastName'))
			                        <span class="help-block">
			                            <strong>{{ $errors->first('lastName') }}</strong>
			                        </span>
			                    @endif
			                </div>
		          		</div>
		          		<div class="row">
			                <div class="col-md-6 mt-10">
			          			<label for="password" class="col-md-12 control-label"><p class="text-left">Password</p></label>
			                    <input id="password" type="password" class="form-control" name="password" required>
			                    @if ($errors->has('password'))
			                        <span class="help-block">
			                            <strong>{{ $errors->first('password') }}</strong>
			                        </span>
			                    @endif
			                </div>
			                <div class="col-md-6 mt-10">
			          			<label for="password-confirm" class="col-md-12 control-label"><p class="text-left">Confirm Password</p></label>
			                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
			                    @if ($errors->has('password_confirmation'))
			                        <span class="help-block">
			                            <strong>{{ $errors->first('password_confirmation') }}</strong>
			                        </span>
			                    @endif
			                </div>	
		          		</div>
		          		<div class="row">
			                <div class="col-md-6 mt-10">
				                <button type="submit" class="btn btn-primary mt-10">
				                    Submit
				                </button>
					        </div>
				    	</div>
		          	</form>
		        </div>
	      	</div>
    	</div>
  	</div>
</div>

@endsection