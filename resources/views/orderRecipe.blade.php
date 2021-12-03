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
		<div class="col-md-4 col-md-offset-2 text-center">
			<div class="order-box">
				{!! getSettingValue('order-report-box-1-text') !!}				
			</div>
		</div>
		<div class="col-md-4 text-center">
			<div class="order-box">
				{!! getSettingValue('order-report-box-2-text') !!}		
			</div>				
		</div>
	</div>
	<div class="row order-recipe-main">
		<div class="col-md-4 col-md-offset-2 text-center">
			<a href="{{ route($name) }}">
				<div class="order-recipe-box">
					<i class="fa fa-file-text" aria-hidden="true"></i><br>
					Run a Report
				</div>
			</a>
		</div>
		<div class="col-md-4 text-center">
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