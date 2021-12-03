	@extends('layouts.template')
@section('content')

<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">How To Videos</h2>
        <ol class="breadcrumb">
            <li><a href="{{ Route('home') }}">Home</a></li>
            <li class="active">How To Videos</li>
        </ol>
    </div>
</div>
<!-- Page Header End -->
 <div class="cps-main-wrap">

    <!-- Pricing Table -->
    <div class="cps-section cps-section-padding property-feature-sheets" id="pricing">
        <div class="container">
            <div class="row">
            	@if(!empty($video))
	            	@foreach($video as $key=>$value)
	                <div class="col-md-4">
			            <div class="video-box">
			               <iframe src="{{ $value->link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			            </div>
			        </div>
			        @endforeach
		        @endif
            </div>
        </div>
    </div>
    <!-- Pricing Table End -->
</div>
@endsection