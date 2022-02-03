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
    <h2 class="page-title">{{__('orderRecipe.createCommunityFeatureSheet')}}</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">{{__('orderRecipe.home')}}</a></li>
      <li><a href="{{ Route('dashboard') }}">{{__('orderRecipe.dashboard')}}</a></li>
      <li class="active">{{__('orderRecipe.orderReport')}}</li>
    </ol>
  </div>
</div>
<div class="container main-section">
	<div class="row order-recipe-main">
		<div class="col-md-12 text-center">
			<div class="order-box" style="padding: 50px;">
				<p style="font-family: 'Lato', sans-serif; font-size: 25px;">{{__('orderRecipe.para1')}}.</p>
				<p style="font-family: 'Lato', sans-serif; font-size: 25px;">{{__('orderRecipe.para2')}} <a href="{{ url('/faqs') }}"><strong>{{__('orderRecipe.FAQs')}}</strong></a> {{__('orderRecipe.page')}}</p>
				<!-- {!! getSettingValue('order-report-box-1-text') !!}				 -->
			</div>
		</div>
	</div>
	<div class="row order-recipe-main">
		<div class="col-md-12 text-center">
			<a href="{{ route($name) }}">
				<div class="order-recipe-box" style="background-color:#EA2448; transition:1s; color:#fff">
					<i class="fa fa-file-text" aria-hidden="true"></i><br>
					{{__('orderRecipe.runReport')}}
				</div>
			</a>
		</div>
	</div>
	<div class="row order-recipe-main" style="padding-top: 100px;">
		<div class="col-md-12 text-center">
			<div class="order-box">
				<p>{{__('orderRecipe.para3')}}</p>
				<p>{{__('orderRecipe.rushServiceAvailable')}}</p>
				<!-- {!! getSettingValue('order-report-box-2-text') !!}		 -->
			</div>				
		</div>
	</div>
	<div class="row order-recipe-main">	
		<div class="col-md-12 text-center">
			<a href="{{ url('/order/'.$cat->slug) }}">
				<div class="order-recipe-box">
					<i class="fa fa-archive" aria-hidden="true"></i><br>
					{{__('orderRecipe.orderCustomReport')}}
				</div>
			</a>
		</div>
	</div>
</div>
@endsection