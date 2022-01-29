@extends('layouts.adminLayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="x_title">
            <div class="col-md-6">
                <h2>Create Post</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('blog.posts') }}" class="btn btn-success">Back to Posts</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="post" class="col-lg-offset-1 col-lg-8">
        {{csrf_field()}}
        <div class="row" style="margin-top:20px;">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Enter Name</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Select Category Name</label>
                    <select class="form-control" name="category_id">
                        <option>Select Category</option>
                        @foreach ($categories as $category)
                            <option class="type" value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Upload Image</label>
                    <input type="file" name="image" class="form-control" placeholder="Upload Image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Status</label><br>
                    <select name="status" class="form-control">
                        <option value="Active" selected="selected">Active</option>
                        <option value="InActive">InActive</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label">Select Tags</label>
                    <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                        @foreach ($tags as $tag)
                            <option class="type" value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 10px;">
                <div class="form-group">
                    <label class="control-label">Enter Description</label>
                    <textarea name="description" class="form-control" id="editor1" placeholder="Enter Description"></textarea>
                </div>
            </div>         
        </div>
        <div class="col-md-12 text-center" style="margin:30px 0px;">
            <hr>
            <div class="form-group">
                <input type="submit" value="Add Blog Post" class="btn btn-primary">
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
<script type="text/javascript">
    $( document ).ready(function() {
        $('.select2-multi').select2();
    });
</script>
@stop