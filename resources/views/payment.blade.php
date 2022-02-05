@extends('layouts.template')

@section('customStyle')
<style type="text/css">
	.col-xs-6 {
		width:50% !important;
	}
</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">{{__('payment.payment')}}</h2>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">{{__('payment.home')}}</a></li>
            <li class="active">{{__('payment.payment')}}</li>
        </ol>
    </div>
</div>
	<div class="cps-main-wrap">
		<div class="cps-section cps-section-padding cps-gray-bg" id="order">
			<div class="container">
				<div class="row">
				    <div  class="col-sm-12 p-0">
				        <div lang="row">
				            <!-- content -->
				            <div class="col-md-12 col-xs-12">
				                <div class="tab-content">
				                    <div class="">
				                        <div class="row mv-m mv-mt-5">
				                            <div class="col-md-12 col-xs-12 heading-title mv-mt-5">
				                                <h3>{{__('payment.shoppingCart')}}</h3>
				                            </div>
				                            @if(!empty(session('cart')))
						                            <div class="col-md-12 col-xs-12 table-payment p-0 mt-10 table-responsive">
						                                <table class="table mt-10">
						                                	<thead>
							                            		<tr>
							                            			<th class="text-center">{{__('payment.image')}}</th>
							                            			<th>{{__('payment.productName')}}</th>
							                            			<th>{{__('payment.model')}}</th>
							                            			<th class="text-center">{{__('payment.unit')}}</th>
							                            			<th class="text-center">{{__('payment.price')}}</th>
							                            			<th class="text-center">{{__('payment.removeCart')}}</th>
							                            		</tr>    	
						                                	</thead>
						                                	<tbody>
						                                		@php
						                                			$subTotal = 0;
						                                		@endphp

						                                		@foreach((array) session('cart') as $id => $details)
							                                		<tr>
							                                			<td width="150">
							                                				<img src="{{ asset('/upload/product/'.$details['image']) }}" style="width:140px;height:auto;">
							                                			</td>
							                                			<td width="400">
							                                				<a href="#" class="tbl-pro-link">{{ $details['name'] }}</a><br>
							                                				@if(!empty($details['neighborhood']))
							                                					<p>{{__('payment.neighborhood')}} : {{ $details['neighborhood'] }}</p><br>
							                                				@endif
							                                				@if(!empty($details['address']))
							                                					<p>{{__('payment.address')}} : {{ $details['address'] }}</p><br>
							                                				@endif
							                                				<p>{{__('payment.extraOption')}} 
							                                					@if($details['extra_option'] == 1)
																					{{__('payment.rushDelivery')}}
							                                					@elseif ($details['extra_option'] == 2)
																					{{__('payment.customDesign')}}
							                                					@else
							                                					
							                                					@endif
							                                				</p>
							                                			</td>
							                                			<td width="100">
							                                				{{ $details['product_code'] }}
							                                			</td>
							                                			<td width="100" class="number-text text-center">
							                                				{{ $details['quantity'] }}
							                                			</td>
							                                			<td width="50" class="number-text count-total text-center">
							                                				${{ number_format($details['quantity'] * $details['price'],2)  }}
							                                			</td>
							                                			<td width="30" class="text-center">
							                                				<!-- <div class="input-group plus-minus-input">
							                                					<input class="input-group-field add-to-cart-detail-pro" type="number" name="quantity" value="{{ $details['quantity'] }}" data-id="{{ $id }}">
							                                				</div> -->
							                                				<button class="btn btn-danger btn-sm close-btn delete-cart" data-id="{{ $id }}"><i class="fa fa-close"></i></button>
							                                			</td>
							                                			@php
							                                				$subTotal = $subTotal + $details['quantity'] * $details['price'];
							                                			@endphp
							                                		</tr>
						                                		@endforeach
						                                	</tbody>
						                                </table>
						                            </div>
						                            <div class="col-md-12 col-xs-12 total-amount-box-cart">
						                            	<div class="row">
						                            		<div class="col-md-offset-9 col-xs-offset-0 col-md-3 col-xs-12">
						                            			<div class="row">
						                            				<div class="col-md-12 col-xs-12 text-right">
						                            					<div class="row">
						                            						<div class="col-md-6 col-xs-6">
						                            							<p><b>{{__('payment.subTotal')}}</b></p>
						                            						</div>
						                            						<div class="col-md-6 col-xs-6 count-total">
						                            							<p><b></b></p>
						                            						</div>
						                            					</div>
						                            					<div class="row">
						                            						<div class="col-md-6 col-xs-6">
						                            							<p><b>{{__('payment.GST')}}</b></p>
						                            						</div>
						                            						<div class="col-md-6 col-xs-6 gst">
						                            							<p><b></b></p>
						                            						</div>
						                            					</div>
						                            					<div class="row">
						                            						<div class="col-md-6 col-xs-6">
						                            							<p><b>{{__('payment.total')}}</b></p>
						                            						</div>
						                            						<div class="col-md-6 col-xs-6 count-total-Price">
						                            							<p><b></b></p>
						                            						</div>
						                            					</div>
						                            				</div>
						                            			</div>
						                            		</div>
						                            	</div>
						                            </div>
				                            	@if(checkProductOrCredit() == 0)
				                            		@if($user->userCredit() > $totalPrice)
				                            			@include('payment.purchase')
				                            		@else
    													@include('payment.payable')
						                            @endif
						                        @elseif(checkProductOrCredit() == 1)
						                        	<div class="payment-box">
							                           	@include('payment.credit')
						                        	</div>
					                            @endif
				                            @else
				                            	 <div class="col-md-12 col-xs-12 total-amount-box-cart text-center">
												 	{{__('payment.shoppingCartEmpty')}}
				                            	 </div>
				                            @endif
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
@endsection

@section('footer_script')

	<script src="https://js.stripe.com/v2/"></script>
	<script src="https://js.stripe.com/v3/"></script>
	<script src="https://parsleyjs.org/dist/parsley.js"></script>
	<script type="text/javascript">
	 	var stripeSecret = '{{ env("STRIPE_PUBLISHABLE_SECRET") }}';
	 	var amount = '{{ $totalPrice - $finalTotalCredit }}';
	 	var type = $('.payment-type-input').val();
	</script>
	<script src="{{ asset('js/payment.js') }}"></script>
	<!-- <script type="text/javascript">
		$('.add-to-cart-detail-pro').on('keyup', function() {
			var id = $(this).attr('data-id');
			var type = 'update-card';
			var quantity = $(this).val();
			$.ajax({
		        url: '{{ route("add-to-cart") }}',
		        method: 'POST',
		        data: {_token:token,product_id:id,quantity:quantity,type:type},
		        success: function(data) {
    				$count = amountGst(data.total);
    				$('.append-data-cart').html(data.ajaxView);
    				$('.cart-button-head').find('li a .quantity').html(data.quantity);
    				$('.cart-button-head').find('li a .total').html($.number(data.total,2));
    				$('.count-total').html('<p style="font-size:14px;"><b>$'+$.number(data.total,2)+'</b></p>');
    				$('.count-total-gst').html('<p style="font-size:14px;"><b>$'+$.number($count,2)+'</b></p>');
    				window.location.reload();		        
    			}
		    });
		});
	</script> -->
@endsection