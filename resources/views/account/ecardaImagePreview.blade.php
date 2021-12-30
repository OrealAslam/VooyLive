@extends('layouts.template')

@section('customStyle')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/ecard.css') }}">
	<style type="text/css">
		.pre-image{
			margin-bottom:20px;
		}
		body{
			background-color: #eef5f9;
		}
		.demo-img{
			height: 300px !important;
		}

		input[type="radio"][class^="chk"] {
	  		display: none;
		}

		.img-label {
			height: 300px;
		  	border: 1px solid #fff;
			padding: 4px;
			display: block;
			position: relative;
			margin: 10px;
			cursor: pointer;
			-webkit-touch-callout: none;
			-webkit-user-select: none;
			-khtml-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		.img-label::before {
		  background-color: white;
		  color: white;
		  content: " ";
		  display: block;
		  border-radius: 50%;
		  border: 1px solid green;
		  position: absolute;
		  top: -5px;
		  left: -5px;
		  width: 25px;
		  height: 25px;
		  text-align: center;
		  line-height: 25px;
		  z-index: 5;
		  transition-duration: 0.4s;
		  transform: scale(0);
		}

		.img-label img {
		  width: 100%;
	      height: 300px;
		  transition-duration: 0.2s;
		  transform-origin: 50% 50%;
		}

		:checked+.img-label {
		  border-color: #ddd;
		}

		:checked+.img-label::before {
		  content: "✓";
		  background-color: green;
		  transform: scale(1);
		}

		:checked+.img-label img {
		  transform: scale(0.9);
		  box-shadow: 0 0 5px #333;
		  z-index: -1;
		}
	</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">Ecards Create</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      <li class="active">Ecards Create</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
  <!-- Custom Features -->
  	<div class="cps-section cps-section-padding" id="features">
      	<div class="container">
  			<div class="row">
  				<div class="col-md-12">
  					
  				</div>
  			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
					<h4>Preview</h4>
					<br>
				</div>
		        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container text-center" style="">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
		        		<img src="{{ url('img/dharro.png')}}" alt="Community Feature Sheet&reg;">
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center pre-image">
		        		<img src="{{ asset('upload/ecard/complete/'.$printImageName) }}" style="width:500px;height:600px;">
					</div>
		        </div>
		  	</div>
		</div>
	</div>
</div>
@endsection
@section('footer_script')
@endsection