@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <form action="{{ route('testimonial.store') }}" enctype="multipart/form-data" method="post" class="col-lg-offset-1 col-lg-8">
        {{csrf_field()}}
        <div class="row" style="margin-top:20px;">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Enter Image</label>
                    <input type="file" name="image" id=""class="form-control" placeholder="Enter Image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Enter Title</label>
                    <input type="text" name="title" id=""class="form-control" placeholder="Enter Title">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Enter Name</label>
                    <input type="text" name="name" id=""class="form-control" placeholder="Enter Name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Enter Designation</label>
                    <input type="text" name="designation" id=""class="form-control" placeholder="Enter Designation">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="" class="control-label">Enter Description</label>
                    <textarea name="description" id=""class="form-control" placeholder="Enter Description"></textarea>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <hr>
                <div class="form-group">
                    <input type="submit" value="Add Testimonial" class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>
</div>
@stop
@section('pageLevelJS')
    
@stop