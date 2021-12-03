
<div class="row">
    <div class="col-md-6 col-xs-12 col-md-offset-3 heading-title mv-mt-5" style="margin-top:40px !important;">
        <h3>PAYMENT</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-xs-12 col-md-offset-3 mt-10 card-head">
    	<div class="row">
    		<form class="form" method="post" action="{{ route('payment.store') }}" id="payment-form">
    			{{csrf_field()}}
                <div class="col-md-12 col-xs-12 mv-mt-5 total-amount-box-cart" style="margin-top:10px;">
                    <label>Instruction</label>
                    <textarea name="introduction" class="form-control" rows="4" style="padding:10px !important;"></textarea>
                </div>
            	<div class="col-md-12 text-left credit-box-price">
            		<p>Get Credit: <b>${{ number_format($actualPrice,2) ?? '' }}</b></p>
            	</div>
                <div class="col-md-12 card-form">
                	<div class="form-group mt-10" style="border: 1px solid #d8d8d8; padding: 10px;">
                        <div id="card-element"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <span class="payment-errors" id="card-errors" style="color: red;margin-top:10px;"></span>
                        </div>
                    </div>
                    <div class="form-group mt-10">
                        <input type="submit" class="btn btn-primry payment-btn-text btn-block" value="PAYMENT">
                    </div> 
                </div>
            </form>
    	</div>
    </div>
</div>