@extends('layouts.template')
@section('content')

<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">{{__('surveyData.marketSentimentSurvey')}}</h2>
        <ol class="breadcrumb">
            <li><a href="{{ Route('home') }}">{{__('surveyData.home')}}</a></li>
            <li class="active">{{__('surveyData.marketSentimentSurvey')}}</li>
        </ol>
    </div>
</div>
<!-- Page Header End -->
 <div class="cps-main-wrap">

    <!-- Pricing Table -->
    <div class="cps-section cps-section-padding property-feature-sheets" id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <p>{!! getSettingValue('market-sentiment-survey') !!}</p>
                </div>
                <div class="col-md-4 col-xs-12">
                    <img src="{{ asset('upload/productImageSetting/'.getSettingValue('market-sentiment-survey-image')) }}">
                </div>
            </div>
        </div>
    </div>
    <!-- Pricing Table End -->
</div>

@include('sub_views.getstarted')

@endsection