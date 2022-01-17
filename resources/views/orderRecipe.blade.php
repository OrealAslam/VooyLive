@extends('layouts.template')

<style type="text/css">
	.order-box{
		border:2px solid #EA2448;
		margin-bottom:20px;
		padding:10px;
		font-size:15px;
		line-height:25px;
		border-radius:5px;
	}
	.main-section{
		padding:45px 0px 30px;
	}
</style>

@section('content')
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">Create Community Feature Sheet®</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      <li class="active">Order Report</li>
    </ol>
  </div>
</div>
<div class="container main-section">
	<div class="row order-recipe-main">
		<div class="col-md-12 text-center">
			<div class="order-box" style="padding: 50px;">
				<p style="font-family: 'Lato', sans-serif; font-size: 25px;">We are happy to announce that automated reports are now available across Canada. Use your credits, pay as you, or sign up for a plan to run reports. If you are outside Canada or want to order a custom report, use the order a customer report link below.</p>
				<p style="font-family: 'Lato', sans-serif; font-size: 25px;">If you have any questions, please refer to our <a href="{{ url('/faqs') }}"><strong>FAQs</strong></a> page</p>
				<!-- {!! getSettingValue('order-report-box-1-text') !!}				 -->
			</div>
		</div>
	</div>
	<div class="row order-recipe-main">
		<div class="col-md-12 text-center">
			<a href="{{ route($name) }}">
				<div class="order-recipe-box" style="background-color:#EA2448; transition:1s; color:#fff">
					<i class="fa fa-file-text" aria-hidden="true"></i><br>
					Run a Report
				</div>
			</a>
		</div>
	</div>
	<div class="row order-recipe-main" style="padding-top: 100px;">
		<div class="col-md-12 text-center">
			<div class="order-box">
				<p>Available for anywhere but Canada. Can be delivered in 3 business days.</p>
				<p>Rush service available.</p>
				<!-- {!! getSettingValue('order-report-box-2-text') !!}		 -->
			</div>				
		</div>
	</div>
	<div class="row order-recipe-main">	
		<div class="col-md-12 text-center">
			<a href="{{ url('/order/'.$cat->slug) }}">
				<div class="order-recipe-box">
					<i class="fa fa-archive" aria-hidden="true"></i><br>
					Order a Custom Report
				</div>
			</a>
		</div>
	</div>
</div>
@endsection