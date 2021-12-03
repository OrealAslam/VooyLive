@extends('layouts.template')
@section('content')

<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
        </ol>
    </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
    <div class="cps-section cps-section-padding">
        <div class="container text-center">
            <div class="">
                <p class="cps-404-text">Something is wrong. Please contact your administrator</p>
                <a class="btn btn-to-home" href="{{url('/')}}">Back to Home</a>
            </div>
        </div>
    </div>
</div>
@endsection