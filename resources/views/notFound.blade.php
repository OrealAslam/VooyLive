@extends('layouts.template')
@section('content')

<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">{{__('notFound.home')}}</a></li>
        </ol>
    </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
    <div class="cps-section cps-section-padding">
        <div class="container text-center">
            <div class="">
                <p class="cps-404-text">{{__('notFound.somethingIsWrong')}}</p>
                <a class="btn btn-to-home" href="{{url('/')}}">{{__('notFound.backToHome')}}</a>
            </div>
        </div>
    </div>
</div>
@endsection