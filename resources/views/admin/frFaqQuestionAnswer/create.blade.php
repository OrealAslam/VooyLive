@extends('layouts.adminLayout')

@section('pageLevelCSS')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-toggle.css') }}">
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="x_title">
            <div class="col-md-6">
                <h2>Create Faq Question Answer</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('faq-question-answer.index',['titleId' => $id]) }}" class="btn btn-success">Back</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="x_panel">
        <form action="{{ route('fr-faq-question-answer.store') }}" enctype="multipart/form-data" method="post" class="col-lg-offset-1 col-lg-8">
            {{csrf_field()}}
                
            <div class="row" style="margin-top:20px;">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="control-label">Enter Question</label>
                        <input type="text" name="question" id=""class="form-control" placeholder="Enter Answer">
                        <input type="hidden" name="fr_faq_question_title_id" value="{{ $id }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="control-label">Enter Answer</label>
                        <textarea class="form-control" name="description" rows="5" id="editor1"></textarea>
                    </div>
                </div>
                <div class="col-md-12 text-center" style="margin:30px 0px;">
                    <div class="form-group">
                        <input type="submit" value="Add Faq Question Answer" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('pageLevelJS')
    <script src="https://cdn.gaic.com/cdn/ui-bootstrap/0.58.0/js/lib/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
         CKEDITOR.replace('editor1');
    </script>
@stop