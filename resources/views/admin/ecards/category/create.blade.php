@extends('layouts.adminLayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="x_title">
            <div class="col-md-6">
                <h2>Ecards Category Create</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('ecard.categorys') }}" class="btn btn-success">Back Ecards Categories</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <form action="{{ route('ecard.category.store') }}" method="post" class="col-lg-offset-1 col-lg-8">
        {{csrf_field()}}
        <div class="form-group">
            <label for="" class="control-label">Enter Category Name</label>
            <input type="text" name="name" id=""class="form-control" placeholder="Enter Category Name">
        </div>
        <div class="form-group">
            <input type="submit" value="Add Ecards Category" class="btn btn-primary pull-right">
        </div>
    </form>
</div>
@stop