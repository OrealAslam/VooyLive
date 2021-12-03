@extends('layouts.adminLayout')
@section('content')


<div class="container">

    <form id="subscribe-form" class="account-form" method="POST" action="">
        {{ csrf_field() }}

        <div class="row form-group{{ $errors->has('credit') ? ' has-error' : '' }}">
            <label for="firstName" class="col-md-4 control-label">Credits</label>
            <div class="col-md-6">
                <input id="credit" type="text" class="form-control" name="credit" value="{{ old('credits') }}" required autofocus>
                @if ($errors->has('credits'))
                    <span class="help-block">
                            <strong>{{ $errors->first('credits') }}</strong>
                        </span>
                @endif
            </div>
        </div>

        <div class="row form-group{{ $errors->has('descr') ? ' has-error' : '' }}">
            <label for="firstName" class="col-md-4 control-label">Description</label>
            <div class="col-md-6">
                <input id="descr" type="text" class="form-control" name="descr" value="{{ old('descr') }}" required autofocus>
                @if ($errors->has('descr'))
                    <span class="help-block">
                            <strong>{{ $errors->first('descr') }}</strong>
                        </span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <br />
                <div class="form-group">
                    <input type="submit" value="Upsert" class="btn btn-primary pull-right">
                    <a href="{{route('userCreditsDetail',['userId' => $user->userId])}}" class="btn btn-default pull-right">User Credits Detail</a>
                    <a href="{{route('userCredits')}}" class="btn btn-default pull-right">All Users Credits</a>
                </div>
            </div>
        </div>

    </form>
</div>
@stop


@section('pageLevelJS')
@endsection