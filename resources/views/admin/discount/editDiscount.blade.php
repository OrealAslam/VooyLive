@extends('layouts.adminLayout')
@section('content')

    <div class="container">
        @if(Session::has('status'))
            <div class="alert alert-success">{{Session::pull('status')}}</div>
        @endif
        <form action="{{action('AdminController@updateDiscount',['id' => $discount->id])}}" method="post" class="col-lg-offset-1 col-lg-8">
            {{csrf_field()}}

            <div class="form-group">
                <label for="" class="control-label">Name</label>
                <input type="text" name="name" id=""class="form-control" value="{{$discount->name}}">
            </div>
            <div class="form-group">
                <label for="" class="control-label">Code</label>
                <input type="text" name="code" id=""class="form-control" value="{{$discount->code}}">
            </div>
            <div class="form-group">
                <label for="" class="control-label">Type</label>
                <select name="type" id="" class="form-control">
                    @if($discount->type =='percent')
                        <option value="percent" selected>Percent</option>
                        <option value="fixed">Fixed</option>
                    @else
                        <option value="percent">Percent</option>
                        <option value="fixed" selected>Fixed</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="" class="control-label">Value</label>
                <input type="text" name="value" id=""class="form-control" value="{{$discount->value}}">
            </div>
            <div class="form-group">
                <label for="" class="control-label">Quantity</label>
                <input type="text" name="times" class="form-control" value="{{$discount->times}}">
            </div>
            <div class="form-group">
                <label for="" class="control-label">Start Date</label>
                <input type="date" name="startDate" class="form-control" value="{{$discount->startDate}}">
            </div>
            <div class="form-group">
                <label for="" class="control-label">End Date</label>
                <input type="date" name="endDate" class="form-control" value="{{$discount->endDate}}">
            </div>

            <div class="form-group">
                <label for="" class="control-label">Status</label>
                <select name="status" id="" class="form-control">
                    @if($discount->status =='1')
                        <option value="1" selected>Active</option>
                        <option value="0">InActive</option>
                    @else
                        <option value="1">Active</option>
                        <option value="0" selected>InActive</option>
                    @endif
                </select>
            </div>

            <div class="form-group">
                <input type="submit" name="AddPLan" value="Update Discount Code" class="btn btn-primary pull-right">
            </div>
        </form>

    </div>

@stop