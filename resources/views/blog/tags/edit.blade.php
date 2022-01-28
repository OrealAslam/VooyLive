@extends('layouts.adminLayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="x_title">
            <div class="col-md-6">
                <h2>Edit Tag</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('blog.categories') }}" class="btn btn-success">Back to Tags</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <form action="{{ route('tag.update',$tag->id) }}" enctype="multipart/form-data" method="post" class="col-lg-offset-1 col-lg-8">
        {{csrf_field()}}
        <div class="row" style="margin-top:20px;">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Enter Name</label>
                    <input type="text" name="name" value="{{ $tag->name }}" class="form-control" placeholder="Enter Name">
                </div>
            </div>
            <div class="col-md-12 text-center" style="margin:30px 0px;">
                <hr>
                <div class="form-group">
                    <input type="submit" value="Update Tag" class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>
</div>
@stop