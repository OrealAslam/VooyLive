@extends('layouts.adminLayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="x_title">
            <div class="col-md-6">
                <h2>Category Edit</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('blog.categories') }}" class="btn btn-success">Back to Categories</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <form action="{{ $category->id ? route('blog.category.update',$category->id) : route('blog.category.store') }}" method="post" class="col-lg-offset-1 col-lg-8">
        {{csrf_field()}}
        <div class="row" style="margin-top:20px;">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="" class="control-label">Enter Name</label>
                    <input type="text" name="name" value="{{ $category->name }}" id="" class="form-control" placeholder="Enter Name">
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 10px;">
                <div class="form-group">
                    <label for="" class="control-label">Enter Description</label>
                    <textarea name="description" class="form-control" id="editor1" placeholder="Enter Description">{{ $category->description }}</textarea>
                </div>
            </div>
            </div><h2>French Language</h2>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="" class="control-label">Enter Name</label>
                    <input type="text" name="name_fr" value="{{ $category->name_fr }}" id="" class="form-control" placeholder="Enter Name">
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 10px;">
                <div class="form-group">
                    <label for="" class="control-label">Enter Description</label>
                    <textarea name="description_fr" class="form-control" id="editor2" placeholder="Enter Description">{{ $category->description_fr }}</textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Status</label><br>
                    <select name="status" id="input-status" class="form-control">
                        @if($category->status == 'Active')
                        <option value="Active" selected="selected">Active</option>
                        <option value="InActive">InActive</option>
                        @else
                        <option value="Active" >Active</option>
                        <option value="InActive" selected="selected">InActive</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-md-12 text-center" style="margin:30px 0px;">
                <hr>
                <div class="form-group">
                    <input type="submit" value="Save Category" class="btn btn-primary">
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
        CKEDITOR.replace('editor2');
    </script>
@stop