@extends('layouts.template')
@section('content')

<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">{{__('privacy.privacy')}}</h2>
        <ol class="breadcrumb">
            <li><a href="{{ Route('home') }}">{{__('privacy.home')}}</a></li>
            <li class="active">{{__('privacy.privacy')}}</li>
        </ol>
    </div>
</div>
<!-- Page Header End -->
 <div class="cps-main-wrap">
    <div class="cps-section cps-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>{!! getSettingValue('privacy-policy') !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection