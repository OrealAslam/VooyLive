@extends('layouts.template')
@section('content')

<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">{{__('propertyFeatureSheetsDetail.propertyFeatureSheets')}}</h2>
        <ol class="breadcrumb">
            <li><a href="{{ Route('home') }}">{{__('propertyFeatureSheetsDetail.home')}}</a></li>
            <li class="active">{{__('propertyFeatureSheetsDetail.propertyFeatureSheets')}}</li>
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
                    <p>{!! getSettingValue('property-featuresheets') !!}</p>
                </div>
                <div class="col-md-4 col-xs-12">
                    <img src="{{ asset('upload/productImageSetting/'.getSettingValue('property-featuresheets-image')) }}">
                </div>
            </div>
        </div>
    </div>
    <!-- Pricing Table End -->
</div>

@include('sub_views.getstarted')

@endsection