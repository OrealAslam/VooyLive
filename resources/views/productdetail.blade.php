@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">{{__('productdetail.productDetails')}}</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">{{__('productdetail.home')}}</a></li>
      <li class="active">{{__('productdetail.productDetails')}}</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
  @include('sub_views.productdetail')

  @include('sub_views.getstarted')
  
</div>
@endsection