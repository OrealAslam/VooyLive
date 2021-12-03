<div class="row">
	<div class="col-md-12">
		<h3 style="text-align: left;font-size:13px;">{{ $product->name }}</h3>
		<a style="cursor:pointer;"><i class="fa fa-close close-checkout-alert-box"></i></a>
	</div>
	<div class="col-md-12 model-text-box-info">
		<div class="row">
			<div class="col-md-3 col-xs-3">
				<img src="{{ asset('upload/product/'.$product->image) }}" style="height:50px;">
			</div>
			<div class="col-md-9 p-0 col-xs-9">
				<div class="row">
					<div class="col-md-11">
						<p>Success : You Have added <a href="#">{{ $product['name'] }}</a> to your shopping cart!</p>
					</div>
					<div class="col-md-12 text-right">
						<a href="{{ route('payment') }}" class="btn btn-sm btn-primary">CHECKOUT</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	   		