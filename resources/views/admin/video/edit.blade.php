@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <form action="{{ route('video.update',$video->id) }}" enctype="multipart/form-data" method="POST" class="col-lg-offset-1 col-lg-8">
        {{csrf_field()}}
        <div class="row" style="margin-top:20px;">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="" class="control-label">Enter Video Link</label>
                    <textarea name="link" id="" rows="4" class="form-control" placeholder="Enter Description">{{ $video->link }}</textarea>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <hr>
                <div class="form-group">
                    <input type="submit" value="Update Video" class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>
</div>
@stop
@section('pageLevelJS')
    
@stop