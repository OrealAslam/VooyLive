@extends('layouts.adminLayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="x_title">
            <div class="col-md-6">
                <h2>Create Category</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('blog.categories') }}" class="btn btn-success">Back to Categories</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <form action="{{ route('blog.category.store') }}" enctype="multipart/form-data" method="post" class="col-lg-offset-1 col-lg-8">
        {{csrf_field()}}
        <div class="row" style="margin-top:20px;">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Enter Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="Enter Name">
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 10px;">
                <div class="form-group">
                    <label for="" class="control-label">Enter Description</label>
                    <textarea name="description" class="form-control" id="editor1" placeholder="Enter Description"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Status</label><br>
                    <select name="status" id="input-status" class="form-control">
                        <option value="Active" selected="selected">Active</option>
                        <option value="InActive">InActive</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 text-center" style="margin:30px 0px;">
                <hr>
                <div class="form-group">
                    <input type="submit" value="Add Category" class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>
</div>
@stop
@section('pageLevelJS')
    <script src="https://cdn.gaic.com/cdn/ui-bootstrap/0.58.0/js/lib/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('editor1');
    </script>
@stop