@extends('layouts.template')

@section('customStyle')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/ecard.css') }}">
	<style type="text/css">
		body{
			background-color: #eef5f9;
		}
		.demo-img{
			height: 300px !important;
		}
		label{
			padding:0px !important;
		}
		input,textarea{
			border-radius: unset !important;
			padding:20px !important;
			border:1px solid #ddd !important;
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
					<h4>Choose a design to get started</h4>
					<br>
				</div>
				<form action="{{ route('front.ecards.demo.store') }}" method="POST">
					{{ csrf_field() }}
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
			            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab">
			            	@foreach($ecard as $key => $value)
					            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					            	<input type="radio" name="image" value="{{ $value->id }}" checked="checked" id="portfolio-{{ $value->id }}" class="chk portfolioModelsFile" />
									<label for="portfolio-{{ $value->id }}" class="img-label"><img src="{{ asset('upload/ecard/sample/'.$value->sample_image) }}" style="margin-bottom: 30px;" class="img-thumbnail"></label>
					            </div>
				            @endforeach
			            </div>

			            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab">
			            	 <div class="col-md-12 mt-10">
			          			<label for="firstName" class="col-md-12 control-label"><p class="text-left">Write an additional greeting</p></label>
			          			<textarea class="form-control" name="a_greeting" rows="3"></textarea>
			                </div>
			            	 <div class="col-md-12 mt-10">
			          			<label for="firstName" class="col-md-12 control-label"><p class="text-left">Write a salutation</p></label>
			                    <input type="text" class="form-control" name="salutation" value="{{ old('salutation') }}">
			                </div>
			            	 <div class="col-md-12 mt-10">
			          			<label for="firstName" class="col-md-12 control-label"><p class="text-left">Write the message</p></label>
			          			<textarea class="form-control" name="message" rows="3"></textarea>
			                </div>
			            	 <div class="col-md-12 mt-10">
			          			<label for="firstName" class="col-md-12 control-label"><p class="text-left">Write a signature</p></label>
			          			<textarea class="form-control" name="signature" rows="3"></textarea>
			                </div>
			            </div>
			            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab text-center" style="margin: 20px 0px;">
			            	<button class="btn btn-primary">Submit</button>
			            </div>
			        </div>
		        </form>
		  	</div>
		</div>
	</div>
</div>
@endsection
@section('footer_script')
@endsection