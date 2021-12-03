<div class="payment-box">
	<div class="row">
        <div class="col-md-6 col-xs-12 col-md-offset-3 heading-title mv-mt-5" style="margin-top:40px !important;">
            <h3>PURCHASE</h3>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-6 col-xs-12 p-0 col-md-offset-3">
    		<form class="form" method="post" action="{{ route('payment.store') }}" id="payment-form">
    			{{csrf_field()}}
    			<div class="credit-box">
    				<div class="row">
                        <div class="col-md-12 col-xs-12 mv-mt-5" style="margin-bottom:15px;">
                            <label>Instruction</label>
                            <textarea name="introduction" class="form-control" rows="4" style="padding:10px !important;"></textarea>
                        </div>
    					<div class="col-md-12">
            				<table class="table table-bordered">
            					<tr>
            						<td class="text-center" width="150"><b>Your Credit</b></td>
            						<td class="text-center" width="150">${{ number_format($user->userCredit(),2) }}</td>
            					</tr>
            					<tr>
            						<td><b>Remaining Credit Will Be</b></td>
            						<td>${{ number_format($finalTotalCredit - $totalPrice,2) }}</td>
            					</tr>
            				</table>
    					</div>
    					@php
    						$totalPay = $finalTotalCredit - $totalPrice;
    						$totalPayment = $user->userCredit() - $totalPay;
    					@endphp
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
			                          <div class="success-msg" style="text-align: left;position: relative;top:-10px;">
			                          </div>
			                          <div class="other-details" style="text-align: left; padding: 5px;">
			                            
			                          </div>
			                        </div>
			                        <div class="col-md-6">
			                        </div>
			                     </div>
		                    </div>
		                    <input type="hidden" name="amount" class="amount-input" value="{{ $totalPayment }}">
							<input type="hidden" name="pre-amount" class="amount-pre-input" value="{{ $totalPayment }}">
							<input type="hidden" class="coupon-code-id" name="coupon_code_id" value="">
    					</div>
    					<div class="col-md-12 text-center">
                            <hr>
            				<h5 class="remember-credit"><span>Payable:</span> ${{ number_format($totalPayment,2) }}</h5>
    					</div>
        				<div class="col-md-12 text-center complete-part">
    						<input type="hidden" name="payment_type" class="payment-type-input" value="1">
            				<input type="hidden" name="category_type" value="1">
        					@foreach((array) session('cart') as $id => $details)
	                    		<input type="hidden" name="product_id" value="{{ $details['product_id'] }}">
	                    		<input type="hidden" name="product_price" value="{{ $details['price'] }}">
	                    		<input type="hidden" name="address" value="{{ $details['address'] }}">
	                    		<input type="hidden" name="neighborhood" value="{{ $details['neighborhood'] }}">
	                    		<input type="hidden" name="extra_option" value="{{ $details['extra_option'] }}">
	                    	@endforeach
        					<input type="submit" class="btn btn-success" value="Payable">
        				</div>
    				</div>
    			</div>
			</form>
    	</div>
    </div>
</div>