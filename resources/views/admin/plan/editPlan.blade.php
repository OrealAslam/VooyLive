@extends('layouts.adminLayout')
@section('content')
    <div class="container">
        @if(Session::has('status'))
            <div class="alert alert-success">{{Session::pull('status')}}</div>
        @endif
        <form action="{{action('AdminController@updatePlan',$plan->id)}}" method="post" class="col-lg-offset-1 col-lg-8">
            {{csrf_field()}}
            <div class="form-group">
                <label for="" class="control-label">Plan Id on stripe Account</label>
                <input type="text" name="name" id=""class="form-control" value="{{$plan->planId}}">
            </div>
            <div class="form-group">
                <label for="" class="control-label">Status</label>
                <select name="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">InActive</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" name="AddPLan" value="Update Plan" class="btn btn-primary pull-right">
            </div>
        </form>
    </div>
@stop