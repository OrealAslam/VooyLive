@extends('layouts.adminLayout')

@section('content')
    @if(Session::has('status'))
        <div class="alert alert-danger">{{Session::pull('status')}}</div>
    @endif
    <a href="{{action('AdminController@addDiscount')}}" class="pull-right btn btn-success" style="margin-right: 5%">Add New Discount Code</a>
    <table class="table table-bordered">
        <thead>
        <th>Name</th>
        <th>Code</th>
        <th>Value</th>
        <th>Type</th>
        <th>Date Start</th>
        <th>Date End</th>
        <th>Status</th>
        <th>Action</th>
        </thead>
        @foreach(\App\DiscountCode::all() as $discount)
            <tr>
                <td>{{$discount->name}}</td>
                <td>{{$discount->code}}</td>
                <td>{{$discount->value}}</td>
                <td>{{$discount->type}}</td>
                <td>{{$discount->startDate}}</td>
                <td>{{$discount->endDate}}</td>
                <td>
                    @if($discount->status =='1')
                        Active
                    @else
                        InActive
                    @endif
                </td>
                <td>
                    <a href="{{action('AdminController@editDiscount',$discount->id)}}" class="btn btn-primary"><li class="fa fa-edit"></li></a>
                    <a href="{{action('AdminController@deleteDiscount',$discount->id)}}" class="btn btn-danger"><li class="fa fa-remove"></li></a>
                </td>
            </tr>
        @endforeach
    </table>
@stop
