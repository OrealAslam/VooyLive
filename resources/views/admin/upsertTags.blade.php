@extends('layouts.adminLayout')
@section('content')


<div class="container">

    <form id="subscribe-form" class="account-form" method="POST" action="" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ isset($data['id']) ? $data['id'] : '' }}">

        <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="firstName" class="col-md-4 control-label">Name</label>
            <div class="col-md-6">
                <input id="firstName" type="text" class="form-control" name="name" value="{{ old('name',(is_object($tagData) && $tagData->name) ? $tagData->name : '') }}" required autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <br />
                <div class="form-group">
                    <input type="submit" value="Upsert" class="btn btn-primary pull-right">
                    <a href="{{route('HdiIconTags')}}" class="btn btn-default pull-right">Cancel</a>
                </div>
            </div>
        </div>

    </form>
</div>
@stop


@section('pageLevelJS')
@endsection