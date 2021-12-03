@extends('layouts.template')
@section('content')

<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">404 Page</h2>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="active">404</li>
        </ol>
    </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
    <div class="cps-section cps-section-padding">
        <div class="container text-center">
            <div class="cps-404-content">
                <h3 class="cps-404-title">Error 404</h3>
                <p class="cps-404-text">404 - Page not found </p>
                <p class="cps-404-text">{{ $exception->getMessage() }}</p>
                <a class="btn btn-to-home" href="{{url('/')}}">Back to Home</a>
            </div>
        </div>
    </div>
</div>
@endsection