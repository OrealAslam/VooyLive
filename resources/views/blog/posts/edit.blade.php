@extends('layouts.adminLayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="x_title">
            <div class="col-md-6">
                <h2>Edit Post</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('blog.posts') }}" class="btn btn-success">Back to Posts</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <form action="{{ $post->id ? route('post.update',$post->id) : route('post.store') }}" enctype="multipart/form-data" method="post" class="col-lg-offset-1 col-lg-8">
        {{csrf_field()}}
        <div class="row" style="margin-top:20px;">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="" class="control-label">Enter Title</label>
                    <input type="text" name="title" id="" value="{{ $post->title }}" class="form-control" placeholder="Enter Name">
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 10px;">
                <div class="form-group">
                    <label for="" class="control-label">Enter Description</label>
                    <textarea name="description" class="form-control" id="editor1" placeholder="Enter Description">{{ $post->description }}</textarea>
                </div>
            </div> 

            <h2>French</h2>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="" class="control-label">Enter Title Fr</label>
                    <input type="text" name="title_fr" id="" value="{{ $post->title_fr }}" class="form-control" placeholder="Enter Name">
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 10px;">
                <div class="form-group">
                    <label for="" class="control-label">Enter Description Fr</label>
                    <textarea name="description_fr" class="form-control" id="editor2" placeholder="Enter Description">{{ $post->description_fr }}</textarea>
                </div>
            </div> 
            


            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Select Category Name</label>
                    <select class="form-control" name="category_id">
                        <option>Select Category</option>
                        @foreach ($categories as $category)
                            <option class="type" value="{{ $category->id }}" {{ ($post->category_id == $category->id ? "selected" : "") }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Upload Image</label>
                    <input type="file" name="image" id="" value="{{ $post->file }}" class="form-control" placeholder="Upload Image">
                    <img src="{{ asset('upload/blog/'.$post->image.'') }}" width="200px" style="margin-top: 10px;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Status</label><br>
                    <select name="status" id="" class="form-control">
                        @if($post->status == 'Active')
                        <option value="Active" selected="selected">Active</option>
                        <option value="InActive">InActive</option>
                        @else
                        <option value="Active" >Active</option>
                        <option value="InActive" selected="selected">InActive</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label">Select Tags</label>
                    <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                        @foreach ($tags as $tag)
                            <option class="type" value="{{ $tag->id }}" {{ ($post->tag_id == $tag->id ? "selected" : "") }}>{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        
        </div>
        <div class="col-md-12 text-center" style="margin:30px 0px;">
            <hr>
            <div class="form-group">
                <input type="submit" value="Update Post" class="btn btn-primary">
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
<script type="text/javascript">
    $( document ).ready(function() {
        $('.select2-multi').select2();
		$('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
    });
</script>
@stop