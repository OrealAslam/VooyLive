@extends('layouts.adminLayout')

@section('pageLevelCSS')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-toggle.css') }}">
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="x_title">
            <div class="col-md-6">
                <h2>Show Faq Question Answer</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('faq-question-answer.index',['titleId'=>$faqQuestionAnswer->faq_question_title_id]) }}" class="btn btn-success">Back</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="x_panel">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table table-bordered">
                    <tr>
                        <th width="150">Faq Question Title</th>
                        <td>{{ $faqQuestionAnswer->faqQuestionTitle->title }}</td>
                    </tr>
                    <tr>
                        <th width="150">Question</th>
                        <td>{{ $faqQuestionAnswer->question }}</td>
                    </tr>
                    <tr>
                        <th width="150">Answer</th>
                        <td>{!! $faqQuestionAnswer->description !!}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

