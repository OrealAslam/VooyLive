@extends('layouts.adminLayout')

@section('content')
<div class="container">

    <form class="form-horizontal col-md-6" method="POST" action="{{ route('updateCustomerPlan', $user->userId) }}">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$user->userId}}">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">User Id</label>
            <div class="col-sm-10">
                <input class="form-control" id="disabledInput" type="text" placeholder="{{$user->userId}}" disabled="disabled">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input class="form-control" id="disabledInput" type="text" placeholder="{{$user->firstName.' '.$user->lastName}}" disabled="disabled">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input class="form-control" id="disabledInput" type="text" placeholder="{{$user->email}}" disabled="disabled">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Current Plan</label>
            <div class="col-sm-10">
                @if($planDetail = \App\Plan::where('planId',$user->plan)->first())
                    <input class="form-control" id="disabledInput" type="text" placeholder="{{$planDetail->name}}" disabled="disabled">
                @else
                    <input class="form-control" id="disabledInput" type="text" placeholder="N/A" disabled="disabled">
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">New Plan</label>
            <div class="col-sm-10">
                <select class="form-control" name="new_plan">
                    <option value="">--</option>
                    @foreach(App\Plan::where('status',1)->get() as $plan)
                        {{-- @if(strpos($plan->planId, Config::get('app.30DayTrialString')) !== false) --}}
                            <option value="{{ $plan->planId }}">{{$plan->name}}</option>
                        {{-- @endif --}}
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>


@stop