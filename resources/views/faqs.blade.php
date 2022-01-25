@extends('layouts.template')
@section('content')

<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">{{__('faqs.FAQs')}}</h2>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">{{__('faqs.home')}}</a></li>
            <li class="active">{{__('faqs.FAQs')}}</li>
        </ol>
    </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
    <!-- FAQ -->
    <div class="cps-section cps-section-padding cps-gradient-bg" id="faq">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-xs-12">
                    <div class="cps-faq-accordion">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            @if(!empty($faqQuestionTitles))
                                @foreach($faqQuestionTitles as $key=>$faqQuestionTitle)
                                    <h4>{{ $faqQuestionTitle->title }}</h4>
                                    @foreach($faqQuestionTitle->faqQuestionAnswer as $key=>$value)
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="heading{{ $value->id }}">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $value->id }}" aria-expanded="false" aria-controls="collapseSeven">{{ $value->question }}</a>
                                                </h4>
                                            </div>
                                            <div id="collapse{{ $value->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven{{ $value->id }}">
                                                <div class="panel-body">
                                                    {!! $value->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ End -->

    @include('sub_views.getstarted')
    
</div>

@endsection