<div class="row">
    <div class="col-md-6 col-xs-12 col-md-offset-3 heading-title mv-mt-5" style="margin-top:40px !important;">
        <h3>Payable</h3>
    </div>
</div>
<div class="row">
	<div class="col-md-6 col-xs-12 col-md-offset-3 mt-10 card-head">
    	<div class="row">
    		<form class="form" method="post" action="{{ route('payment.store') }}" id="payment-form">
    			{{csrf_field()}}
    			<div class="row">
                	<div class="col-md-12 col-xs-12">
            			<div class="credit-box">
            				<div class="row">
            					@php
            						$totalPay = $finalTotalCredit - $totalPrice;
            						$totalPayment = $user->userCredit() - $totalPay;
            					@endphp
                                <div class="col-md-12 col-xs-12 mv-mt-5" style="margin-bottom:15px;">
                                    <label>Instruction</label>
                                    <textarea name="introduction" class="form-control" rows="4" style="padding:10px !important;"></textarea>
                                </div>
            					<div class="col-md-12">
                    				<table class="table table-bordered">
                    					<tr>
                    						<td class="text-center" width="150"><b>Your Credit</b></td>
                    						<td class="text-center" width="150"><b>${{ number_format($user->userCredit(),2) }}</b></td>
                    					</tr>
                    					<tr>
                    						<td><b>product</b></td>
                    						<td><b>${{ number_format($totalPayment,2) }}</b></td>
                    					</tr>
                    				</table>
            					</div>
            					<div class="col-md-12 text-center">
            						<div class="form-group" style="margin-top: 15px;">
					                     <div class="row">
					                        <div class="col-md-6">
					                          <div class="input-group bg-white" style="margin-top: 10px; display: flex;">
					                              <input id="code" type="text" class="form-control code-input" name="code" value="{{ old('code') }}" style="color: black !important; " placeholder="Coupon Code">
					                              <div class="input-group-append code-btn">
					                                  <button type="button" class="btn btn-success input-group-text" id="code-btn">Apply</button>
					                              </div>
					                          </div>
					                          <div class="success-msg" style="text-align: left;">
					                          </div>
					                          <div class="other-details" style="text-align: left; padding: 5px;">
					                            
					                          </div>
					                        </div>
					                        <div class="col-md-6">
					                        </div>
					                     </div>
				                    </div>
				                    <input type="hidden" name="amount" class="amount-input" value="{{ $totalPrice - $finalTotalCredit }}">
									<input type="hidden" name="pre-amount" class="amount-pre-input" value="{{ $totalPrice - $finalTotalCredit }}">
									<input type="hidden" class="coupon-code-id" name="coupon_code_id" value="">
            					</div>
            					<div class="col-md-12 text-center">
                    				<h5 class="remember-credit"><span>Payable Now : </span>$ {{ number_format(abs($finalTotalCredit - $totalPrice),2) }}</h5>
            					</div>
            					<div class="col-md-12">
            						<input type="hidden" name="payment_type" class="payment-type-input" value="2">	
                        			<input type="hidden" name="category_type" value="1">
                        			@foreach((array) session('cart') as $id => $details)
                            			<input type="hidden" name="address" value="{{ $details['address'] }}">
                    					<input type="hidden" name="neighborhood" value="{{ $details['neighborhood'] }}">
                    					<input type="hidden" name="extra_option" value="{{ $details['extra_option'] }}">
                					@endforeach
	                            	<div class="form-group mt-10" style="border: 1px solid #d8d8d8; padding: 10px;">
				                        <div id="card-element"></div>
				                    </div>
				                    <div class="row">
				                        <div class="col-md-12">
				                            <span class="payment-errors" id="card-errors" style="color: red;margin-top:10px;"></span>
				                        </div>
				                    </div>
            					</div>
                				<div class="col-md-12 text-center complete-part">
                					<input type="submit" class="btn btn-success" value="Payable">
                				</div>
            				</div>
            			</div>
                	</div>
                </div>
                <!-- <div class="col-md-12 mt-10 card-form">
                	@if($user->userCredit() == 0)
                		<div class="count-total-gst">
                			<h5 style="display: inline;">You Total Pay Is</h5>
                			<p style="display: inline;font-size:20px;">(<b></b>)</p>
                		</div>
                	@else
                		<h5>Your Credit Is ${{ $user->userCredit() }} Remaining Credit Will Be $ {{ abs($finalTotalCredit - $totalPrice) }}</h5>
                	@endif
                	<input type="hidden" name="payment_type" value="2">
        			<input type="hidden" name="category_type" value="1">
                	<div class="form-group mt-10" style="border: 1px solid #d8d8d8; padding: 10px;">
                        <div id="card-element"></div>
                    </div> 
                    <div class="form-group mt-10">
                        <input type="submit" class="btn btn-primry payment-btn-text btn-block" value="Payment">
                    </div>  -->
                </div>
            </form>
    	</div>
    </div>
</div>