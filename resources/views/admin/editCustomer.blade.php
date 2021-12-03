@extends('layouts.adminLayout')

@section('content')
<div class="container">

    <form id="subscribe-form" class="account-form" method="POST" action="{{ url('admin/updateCustomerForm') }}">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $customerData->userId }}">

        <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
            <label for="firstName" class="col-md-4 control-label">First Name</label>

            <div class="col-md-6">
                <input id="firstName" type="text" class="form-control" name="firstName" value="{{ old('firstName',$customerData->firstName) }}" required autofocus>

                @if ($errors->has('firstName'))
                    <span class="help-block">
                            <strong>{{ $errors->first('firstName') }}</strong>
                        </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
            <label for="lastName" class="col-md-4 control-label">Last Name</label>

            <div class="col-md-6">
                <input id="lastName" type="text" class="form-control" name="lastName" value="{{ old('lastName',$customerData->lastName) }}" required >

                @if ($errors->has('lastName'))
                    <span class="help-block">
                            <strong>{{ $errors->first('lastName') }}</strong>
                        </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">
            <label for="region" class="col-md-4 control-label"> Region </label>

            <div class="col-md-6">
                <select class="form-control" id="region" name="region" required >
                    @foreach(App\City::where('status',1)->get() as $city)
                    <option value="{{ $city->id }}" @if($city->id == $customerData->region) {{'selected="selected"'}} @endif >{{$city->Province->name}} - {{$city->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('region'))
                    <span class="help-block">
                            <strong>{{ $errors->first('region') }}</strong>
                        </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">Work Email </label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email',$customerData->email) }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif
            </div>
        </div>


        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <br />
                <div class="form-group">
                    <input type="submit" value="Update Customer" class="btn btn-primary pull-right">
                </div>
            </div>
        </div>

    </form>
</div>


@stop