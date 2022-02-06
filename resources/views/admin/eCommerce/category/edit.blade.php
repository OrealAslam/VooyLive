@extends('layouts.adminLayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="x_title">
            <div class="col-md-6">
                <h2>Category Edit</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('categorys') }}" class="btn btn-success">Back Category</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <form action="{{ route('category.update',$data->id)}}" method="post" class="col-lg-offset-1 col-lg-8">
        {{csrf_field()}}
        <div class="form-group">
            <label for="" class="control-label">Enter Category Name</label>
            <input type="text" name="title" value="{{ $data->title }}" id=""class="form-control" placeholder="Enter Category Name">
        </div>
        <div class="form-group">
            <label for="" class="control-label">Enter Category Name Fr</label>
            <input type="text" name="title_fr" value="{{ $data->title_fr }}" class="form-control" placeholder="Enter Category Name Fr">
        </div>
        <div class="form-group">
            <label class="control-label">Select Type</label>
            <select class="form-control" name="type">
                <option>Select Type</option>
                <option value="1" {{ ($data->type == 1) ? 'selected' : '' }}>Credit</option>
                <option value="0" {{ ($data->type == 0) ? 'selected' : '' }}>Product</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Add Category" class="btn btn-primary pull-right">
        </div>
    </form>
</div>
@stop