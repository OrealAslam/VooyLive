@extends('layouts.template')

@section('customStyle')

@endsection

@section('content')
<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">{{__('order.order')}}</h2>
        <ol class="breadcrumb">
            <li><a href="{{ Route('home') }}">{{__('order.home')}}</a></li>
            <li class="active">{{__('order.order')}}</li>
        </ol>
    </div>
</div>
    <!-- tab -->
    	<div class="cps-main-wrap">
    		<div class="cps-section cps-section-padding cps-gray-bg" id="order">
    			<div class="container">
					<div class="row">
					    <div  class="col-sm-12 p-0">
					        <div lang="row">
					            <div class="col-md-3 col-xs-12 left-sidebar">
					                <ul class="nav nav-tabs tabs-left">
					                	@if(!empty($categories))
						                    <li class="head-tab-left-title">{{__('order.allCategories')}}</a></li>
					                		@foreach($categories as $key => $value)
						                    	<li class="{{ $slug == $value->slug ? 'active' : '' }}"><a href="{{ url('/order/'.$value->slug) }}"> > {{ $value->title }} ({{ $value->product->count() }})</a></li>
						                    @endforeach
					                    @endif
					                </ul>
					            </div>
					            <!-- content -->
					            <div class="col-md-9 col-xs-12">
					                <div class="tab-content">
					                    <div class="">
					                        <div class="row mv-m mv-mt-5">
					                            <div class="col-md-12 col-xs-12 heading-title mv-mt-5">
					                                <h3>{{ $category->title }}</h3>
					                            </div>
					                          <!--   <div class="col-md-12 col-xs-12 filter-box">
					                                <div class="col-md-1 box-style col-xs-3">
					                                    <i class="fa fa-th" aria-hidden="true"></i>
					                                    <i class="fa fa-th-list active" aria-hidden="true"></i>
					                                </div>
					                                <div class="col-md-5 col-xs-9 product-compare text-left">
					                                    <a href="#">Product Compare (0)</a>
					                                </div>
					                                <div class="col-md-4 col-xs-12 sort-by mv-mt-5">
					                                	<div class="row">
					                                		<div class="col-md-3 col-xs-3 text-right drop-down-title-label short-by">
					                                    		<label>Short By :</label>
					                                		</div>
					                                		<div class="col-md-9 col-xs-9">
							                                    <select name="" class="short-by-select">
							                                        <option  selected="selected">Default</option>
							                                        <option>Name (A - Z)</option>
							                                        <option>Name (Z - A)</option>
							                                        <option>Price (Low &gt; High)</option>
							                                        <option>Price (High &gt; Low)</option>
							                                        <option>Model (A - Z)</option>
							                                        <option>Model (Z - A)</option>
							                                    </select>
					                                		</div>
					                                	</div>
					                                </div>
					                                <div class="col-md-2 col-xs-12 sort-by">
					                                	<div class="row">
					                                		<div class="col-md-5 col-xs-3 text-right drop-down-title-label show-title-drop">
					                                    		<label>Show :</label>
					                                		</div>
					                                		<div class="col-md-7 col-xs-9">
							                                     <select name="" class="short-by-select">
							                                        <option value="">15</option>
							                                        <option value="">25</option>
							                                        <option value="">50</option>
							                                        <option value="">75</option>
							                                        <option value="">100</option>
							                                     </select>
					                                		</div>
					                                	</div>
					                                </div>
					                            </div> -->
					                        </div>
					                        <div class="row mv-m">
					                        	@if(!empty($products))
					                        		@foreach($products as $key => $value)
							                            <div class="col-md-12 p-0">
							                                <div class="{{ $value->actual_price ? 'card-ribbons':'' }}" data-label="Get Credit ${{ number_format($value->actual_price,2) ?? '' }}">
								                                <div class="product-box right-content-box">
								                                    <div class="row">
								                                        <div class="col-md-3">
								                                            <img src="{{ asset('/upload/product/'.$value->image) }}" alt="" class="product-img">
								                                        </div>
								                                        <div class="col-md-9">
								                                            <div lang="row">
								                                                <div class="col-md-6 product-name">
								                                                    <a href="{{ route('order.detail',$value->id) }}" class="link-title">{{ $value->name }}</a>
								                                                </div>
								                                                <div class="col-md-12 product-description">
								                                                    {!!   substr(strip_tags(html_entity_decode($value->description)), 0, 100) . '...'  !!}
								                                                </div>
								                                                <div class="col-md-12 mv-center mv-mt-5">
								                                                    <b class="poduct-price">${{ number_format($value->price,2) }}</b>
								                                                </div>
								                                                <div class="col-md-12 cart-box mv-center mv-mt-5">
								                                                    <a href="{{ route('order.detail',$value->id) }}" class="cart-btn mv-mt-5"><i class="fa fa-shopping-cart"></i> {{__('order.addToCart')}}</a>
								                                                </div>
								                                                <!-- <div class="col-md-12 product-com-wish-box col-xs-12 mv-mt-5">
								                                                    <a href="" class="mv-br mv-center mv-mt-5"><i class="fa fa-heart" aria-hidden="true"></i> Add to Wish List</a>
								                                                    <a href="" class="mv-br mv-center mv-mt-5"><i class="fa fa-refresh" aria-hidden="true"></i> Compare this Product</a>
								                                                </div> -->
								                                            </div>
								                                        </div>
								                                    </div>
								                                </div>
							                            	</div>
							                            </div>
							                        @endforeach
							                    @endif
							                    <div class="row">
								                    <div class="col-md-12 text-right">
									                    @if(!empty($products))
															{!! $products->appends(Request::all())->render() !!}
														@endif
								                    </div>
							                    </div>
					                        </div>
					                    </div>
					                </div>
					            </div>
					            <!-- content -->
					        </div>
					    </div>
					</div>
				</div>
    		</div>
    	</div>
    <!-- tab -->
@endsection

@section('footer_script')

@endsection