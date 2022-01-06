@include('emails.sub_views.header')

<div style="width:100%;">
	<p>You Have received an order.</p>
</div>

<div style="width:100%">
	<table class="table" style="width:100%;border:1px solid #d2d2d2;border-collapse: collapse;">
		<tr  style="background:#d2d2d2;">
			<th style="padding:7px;text-align:left;">
				Profile Details
			</th>
			<th style="padding:7px;text-align:left;"></th>
		</tr>
		<tr>
			<td style="padding:10px 5px;">
				<ul style="list-style: none;margin:0px;padding:0px;line-height: 23px;">
					<li><b>Name : </b><span>{{ $firstName }} {{ $lastName }}</span></li>
					<li><b>Email : </b><span>{{ $email }}</span></li>
				</ul>
			</td>
		</tr>
	</table>
</div>

<div style="width:100%;margin-top:15px;">
	<table class="table" style="width:100%;border:1px solid #d2d2d2;border-collapse: collapse;">
		<tr  style="background:#d2d2d2;">
			<th style="padding:7px;text-align:left;">
				Credit Details
			</th>
			<th style="padding:7px;text-align:left;">Remember</th>
		</tr>
		<tr>
			<td style="padding:15px;border:1px solid #d2d2d2;">
				<p style="padding:0px 15px 8px 0px;margin:0px;">Remaining Credit : <strong>${{ number_format(auth()->user()->userCredit(),2) }}</strong></p> <a href="{{ url('/order/'.$category->slug) }}?type=orderMoreCredit" style="background-color: #ea2349;color:#fff;border-radius:15px;padding:4px 7px;font-size:11px;margin-right:10px;text-decoration: none;" class="btn btn-primary">Get More Credit</a>
			</td>
			<td style="border:1px solid #d2d2d2;">
			<p style="padding:0px 15px 8px 0px;margin:0px;"><a href="{{ URL::Route('survey-detail') }}" style="background-color: #ea2349;color:#fff;border-radius:15px;padding:4px 7px;font-size:10px;text-decoration: none;margin-left: 10px;" class="btn btn-primary">Weekly REALTOR®️ Survey</a></p>
			</td>
		</tr>
	</table>
</div>

@if($payment->payment_type != 0)
	<div style="width:100%; margin-top:15px;">
		<table class="table" style="width:100%;border:1px solid #d2d2d2;border-collapse: collapse;">
			<tr  style="background:#d2d2d2;">
				<th style="padding:7px;text-align:left;">
					Delivery Details
				</th>
			</tr>
			<tr>
				<td style="padding:10px 5px;">
					<ul style="list-style: none;margin:0px;padding:0px;line-height: 23px;">
						<li><p>Your proof has been scheduled for delivery on {{ date('d/m/Y', strtotime($deliveryData)) }}</p></li>
					</ul>
				</td>
			</tr>
		</table>
	</div>
@endif

<div style="width:100%;margin-top:15px;">
	<!-- {{ $payment }} -->
	<table class="table" style="width:100%;border:1px solid #d2d2d2;border-collapse: collapse;">
		<tr  style="background:#d2d2d2;">
			<th style="padding:7px;text-align:left;">
				Order Details
			</th>
		</tr>
		<tr>
			<td style="padding:10px 5px;">
				<ul style="list-style: none;margin:0px;padding:0px;line-height: 23px;">
					<li><b>Order Id : </b><span>{{ $payment->id }}</span></li>
					<li><b>Date : </b><span>
						{{ $payment->created_at->format('m/d/Y')}}
					</span></li>
					<li><b>Payment Method : </b>
						<span>
							@if($payment->payment_type == 0)
								Stripe
							@elseif($payment->payment_type == 1)
								Credit
							@elseif($payment->payment_type == 2)
								Credit/Stripe
							@endif
						</span>
					</li>
				</ul>
			</td>
		</tr>
	</table>
</div>

<div style="width:100%;margin-top:15px;">
	<!-- {{ $payment }} -->
	<table class="table" style="width:100%;border:1px solid #d2d2d2; border-collapse: collapse;">
		<tr style="background:#d2d2d2;">
			<th style="padding:7px;text-align:left;">
				Instructions
			</th>
		</tr>
		<tr>
			<td style="padding:10px 5px">
				<ul style="list-style: none;margin:0px;padding:5px;">
					<li>
						<p style="color:#686262;">
							@if(!empty($introduction))
								{{ $introduction }}
							@else
								-
							@endif
						</p>
					</li>
				</ul>
			</td>
		</tr>
	</table>
</div>

<div style="width:100%;margin-top:15px;">
	<!-- {{ $payment }} -->
	<table class="table" style="width:100%;border:1px solid #d2d2d2; border-collapse: collapse;">
		<tr style="background:#d2d2d2;">
			<th style="padding: 7px;">
				@foreach($productdata as $value)
					@if($loop->first)
						@if($value->pro_type == 0)
							Product
						@else
							Credit
						@endif
					@endif
				@endforeach
			</th>
			<th style="padding: 7px;">Quantity</th>
			<th style="padding: 7px;">Price</th>
			<th style="padding: 7px;">Total</th>
		</tr>
		@foreach($productdata as $value)
			<tr>
				<th style="border: 1px solid #d2d2d2;text-align: center;padding: 7px;">{{ $value->name }}</th>
				<th style="border: 1px solid #d2d2d2;text-align: center;padding: 7px;">{{ $value->quantity }}</th>
				<th style="border: 1px solid #d2d2d2;text-align: center;padding: 7px;">${{ $value->price }}.00</th>
				<th style="border: 1px solid #d2d2d2;text-align: center;padding: 7px;">${{ $value->price }}.00</th>
			</tr>
		@endforeach

		@if($payment->payment_type == 0)
			<tr style="padding: 2px 5px;">
				<td style="text-align: right;padding: 5px;" colspan="3"><b>Total</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format($payment->amount, 2) }}
				</td>
			</tr>
			<tr style="padding: 2px 5px;">
				<td style="text-align: right;padding: 5px;" colspan="3"><b>GST</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format(amountGst($payment->amount), 2) }}
				</td>
			</tr>
			<tr style="padding: 2px 5px;">
				<td style="text-align: right;padding: 5px;" colspan="3"><b>Paid Amount</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format($payment->total_amount, 2) }}
				</td>
			</tr>
		@endif		

		@if($payment->payment_type == 1)
			<tr style="padding: 2px 5px;">
				<td style="text-align: right;padding: 5px;" colspan="3"><b>Total</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format($totalAmount, 2) }}
				</td>
			</tr>
			<tr style="padding: 2px 5px;">
				<td style="text-align: right;padding: 5px;" colspan="3"><b>GST</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format(amountGst($totalAmount), 2) }}
				</td>
			</tr>
			@if(!empty($discountPrice))
				<tr style="padding: 2px 5px;">
					<td style="text-align: right;padding: 5px;" colspan="3"><b>Discount</b></td>
					<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
						${{ number_format($discountPrice, 2) }}
					</td>
				</tr>
			@endif
			<tr style="padding: 2px 5px;">
				<td style="text-align: right;padding: 5px;" colspan="3"><b>Sub Total</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format($payment->total_amount, 2) }}
				</td>
			</tr>
			<tr style="padding: 2px 5px;">
				<td style="text-align: right;padding: 5px;" colspan="3"><b>Use Credit</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format($credit->use ?? 0, 2) }}
				</td>
			</tr>
			<tr style="padding: 2px 5px;">
				<td style="text-align:right;padding: 5px;" colspan="3"><b>Paid Amount</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					$00.00
				</td>
			</tr>
		@endif

		@if($payment->payment_type == 2)
			<tr style="padding: 2px 5px;">
				<td style="text-align: right;padding: 5px;" colspan="3"><b>Total</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format($totalAmount, 2) }}
				</td>
			</tr>
			<tr style="padding: 2px 5px;" >
				<td style="text-align: right;padding: 5px;" colspan="3"><b>GST</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format(amountGst($totalAmount), 2) }}
				</td>
			</tr>
			@if(!empty($discountPrice))
				<tr style="padding: 2px 5px;">
					<td style="text-align: right;padding: 5px;" colspan="3"><b>Discount</b></td>
					<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
						${{ number_format($discountPrice, 2) }}
					</td>
				</tr>
			@endif
			<tr style="padding: 2px 5px;">
				<td style="text-align: right;padding: 5px;" colspan="3"><b>Sub Total</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format($payment->total_amount, 2) }}
				</td>
			</tr>
			<tr style="padding: 2px 5px;">
				<td style="text-align: right;padding: 5px;" colspan="3"><b>Use Credit</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format($credit->use, 2) }}
				</td>
			</tr>
			<tr style="padding: 2px 5px;">
				<td style="text-align: right;padding: 5px;" colspan="3"><b>Paid Amount</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format($credit->stripe, 2) }}
				</td>
			</tr>
		@endif
	</table>
	@if(!empty($discountCode))
		<b>Your Discount Code : {{ $discountCode ?? '' }}</b>
	@endif
	@if($payment->payment_type == 0)
		<b>Your Get Credit : ${{ number_format($actualPrice,2) ?? '' }}</b>
	@endif
</div>

<div class="top-box">
	<div style="width:100%;">
		<table>
			<tr>
				<td></td>
			</tr>
		</table>
	</div>
</div>

@include('emails.sub_views.footer')