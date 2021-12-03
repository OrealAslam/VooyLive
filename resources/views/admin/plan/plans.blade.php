@extends('layouts.adminLayout')

@section('content')
    @if(Session::has('status'))
        <div class="alert alert-danger">{{Session::pull('status')}}</div>
    @endif
    <a href="{{action('AdminController@addPlan')}}" class="pull-right btn btn-success" style="margin-right: 5%">Add New Plan</a>

    <table class="table table-bordered">
        <thead>
        <th>Name</th>
        <th>Plan Id</th>
        <th>Interval</th>
        <th>Trial Period Days</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Action</th>
        </thead>
        @foreach(\App\Plan::all() as $plan)
            <tr>
                <td>{{$plan->name}}</td>
                <td>{{$plan->planId}}</td>
                <td>
                   {{$plan->interval}}
                </td>
                <td>
                   {{$plan->trial_period_days}}
                </td>
                <td>
                   {{$plan->amount}}
                </td>

                <td>
                   {{$plan->status}}
                </td>
                <td>
                    <a href="{{action('AdminController@editPlan',$plan->id)}}" class="btn btn-primary"><li class="fa fa-edit"></li></a>
                    <a href="{{action('AdminController@deletePlan',$plan->id)}}" class="btn btn-danger"><li class="fa fa-remove"></li></a>
                </td>
            </tr>
        @endforeach
    </table>

@stop