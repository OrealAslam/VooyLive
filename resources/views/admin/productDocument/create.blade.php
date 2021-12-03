@extends('layouts.adminLayout')

@section('pageLevelCSS')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-toggle.css') }}">
@stop

@section('content')
<div class="container">
    <form action="{{ route('product.document.store') }}" enctype="multipart/form-data" method="post" class="col-lg-offset-1 col-lg-8">
        {{csrf_field()}}
        <div class="row" style="margin-top:20px;">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Enter Title</label>
                    <input type="text" name="title" id=""class="form-control" placeholder="Enter Title">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Upload Document</label>
                    <input type="file" name="document" id=""class="form-control" placeholder="Upload Document">
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center" style="margin:20px 0px;">
            <hr>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>
@stop
@section('pageLevelJS')
    <script src="{{ asset('js/bootstrap-toggle.js') }}"></script>
    <script src="https://cdn.gaic.com/cdn/ui-bootstrap/0.58.0/js/lib/ckeditor/ckeditor.js"></script>
@stop