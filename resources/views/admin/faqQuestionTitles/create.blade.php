@extends('layouts.adminLayout')

@section('pageLevelCSS')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-toggle.css') }}">
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="x_title">
            <div class="col-md-6">
                <h2>Create Faq Question Title</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('faq-question-title.index') }}" class="btn btn-success">Back</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="x_panel">
        <form action="{{ route('faq-question-title.store') }}" enctype="multipart/form-data" method="post" class="col-lg-offset-1 col-lg-8">
            {{csrf_field()}}
            <div class="row" style="margin-top:20px;">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="control-label">Enter Title</label>
                        <input type="text" name="title" id=""class="form-control" placeholder="Enter Title">
                    </div>
                </div>
                <div class="col-md-12 text-center" style="margin:30px 0px;">
                    <div class="form-group">
                        <input type="submit" value="Add Faq Question Title" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
