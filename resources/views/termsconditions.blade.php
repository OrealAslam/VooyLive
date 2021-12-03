@extends('layouts.template')
@section('content')

<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">Terms & Conditions</h2>
        <ol class="breadcrumb">
            <li><a href="{{ Route('home') }}">Home</a></li>
            <li class="active">Terms & Conditions</li>
        </ol>
    </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
    <!-- Services -->
    <div id="cps-service" class="cps-section cps-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-xs-12">
                    <div class="cps-section-header">
                        {!! getSettingValue('terms-conditions') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->
</div>
@endsection