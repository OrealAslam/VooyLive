@extends('layouts.adminLayout')
@section('content')

    <div class="container">
        @if(Session::has('status'))
            <div class="alert alert-success">{{Session::pull('status')}}</div>
        @endif
        <form action="{{action('AdminController@addNewDiscount')}}" method="post" class="col-lg-offset-1 col-lg-8">
            {{csrf_field()}}
            <div class="form-group">
                <label for="" class="control-label">Name</label>
                <input type="text" name="name" id=""class="form-control">
            </div>


            <div class="form-group">
                <label for="" class="control-label">Code</label>
                <input type="text" name="code" id=""class="form-control">
            </div>


            <div class="form-group">
                <label for="" class="control-label">Type</label>
                <select name="type" id="" class="form-control">
                    <option value="percent">Percentage</option>
                    <option value="fixed">Fixed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="" class="control-label">Value</label>
                <input type="text" name="value" id=""class="form-control">
            </div>

            <div class="form-group">
                <label  class="control-label">Quantity</label>
                <input type="text" name="times" class="form-control">
            </div>            

            <div class="form-group">
                <label for="" class="control-label">Star Date</label>
                <input type="date" name="startDate" class="form-control">
            </div>

            <div class="form-group">
                <label for="" class="control-label">End Date</label>
                <input type="date" name="endDate" class="form-control">
            </div>

            <div class="form-group">
                <label for="" class="control-label">Status</label>
                <select name="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">InActive</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="AddPLan" value="Add Discount Code" class="btn btn-primary pull-right">
            </div>
        </form>

    </div>

@stop