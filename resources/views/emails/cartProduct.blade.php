@include('emails.sub_views.header')

<div style="width:100%;">
	<p>{{__('emails.cartProduct.para1')}}</p>
</div>

<div style="width:100%">
	<table class="table" style="width:100%;border:1px solid #d2d2d2;border-collapse: collapse;">
		<tr  style="background:#d2d2d2;">
			<th style="padding:7px;text-align:left;">
				{{__('emails.cartProduct.profileDetails')}}
			</th>
			<th style="padding:7px;text-align:left;"></th>
		</tr>
		<tr>
			<td style="padding:10px 5px;">
				<ul style="list-style: none;margin:0px;padding:0px;line-height: 23px;">
					<li><b>{{__('emails.cartProduct.name')}}</b><span>{{ $firstName }} {{ $lastName }}</span></li>
					<li><b>{{__('emails.cartProduct.email')}} </b><span>{{ $email }}</span></li>
				</ul>
			</td>
		</tr>
	</table>
</div>

<div style="width:100%;margin-top:15px;">
	<table class="table" style="width:100%;border:1px solid #d2d2d2;border-collapse: collapse;">
		<tr  style="background:#d2d2d2;">
			<th style="padding:7px;text-align:left;">
				{{__('emails.cartProduct.creditDetails')}}
			</th>
			<th style="padding:7px;text-align:left;">{{__('emails.cartProduct.remember')}}</th>
		</tr>
		<tr>
			<td style="padding:15px;border:1px solid #d2d2d2;">
				<p style="padding:0px 15px 8px 0px;margin:0px;">{{__('emails.cartProduct.remainingCredit')}} <strong>${{ number_format(auth()->user()->userCredit(),2) }}</strong></p> <a href="{{ url('/order/'.$category->slug) }}?type=orderMoreCredit" style="background-color: #ea2349;color:#fff;border-radius:15px;padding:4px 7px;font-size:11px;margin-right:10px;text-decoration: none;" class="btn btn-primary">{{__('emails.cartProduct.getMoreCredit')}}</a>
			</td>
			<td style="border:1px solid #d2d2d2;">
			<p style="padding:0px 15px 8px 0px;margin:0px;"><a href="{{ URL::Route('survey-detail') }}" style="background-color: #ea2349;color:#fff;border-radius:15px;padding:4px 7px;font-size:10px;text-decoration: none;margin-left: 10px;" class="btn btn-primary">{{__('emails.cartProduct.weeklyREALTORSurvey')}}</a></p>
			</td>
		</tr>
	</table>
</div>

@if($payment->payment_type != 0)
	<div style="width:100%; margin-top:15px;">
		<table class="table" style="width:100%;border:1px solid #d2d2d2;border-collapse: collapse;">
			<tr  style="background:#d2d2d2;">
				<th style="padding:7px;text-align:left;">
					{{__('emails.cartProduct.deliveryDetails')}}
				</th>
			</tr>
			<tr>
				<td style="padding:10px 5px;">
					<ul style="list-style: none;margin:0px;padding:0px;line-height: 23px;">
						<li><p>{{__('emails.cartProduct.para2')}} {{ date('d/m/Y', strtotime($deliveryData)) }}</p></li>
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
				{{__('emails.cartProduct.orderDetails')}}
			</th>
		</tr>
		<tr>
			<td style="padding:10px 5px;">
				<ul style="list-style: none;margin:0px;padding:0px;line-height: 23px;">
					<li><b>{{__('emails.cartProduct.orderId')}}</b><span>{{ $payment->id }}</span></li>
					<li><b>Date : </b><span>
						{{ $payment->created_at->format('m/d/Y')}}
					</span></li>
					<li><b>{{__('emails.cartProduct.paymentMethod')}} </b>
						<span>
							@if($payment->payment_type == 0)
								{{__('emails.cartProduct.stripe')}}
							@elseif($payment->payment_type == 1)
								{{__('emails.cartProduct.credit')}}
							@elseif($payment->payment_type == 2)
								{{__('emails.cartProduct.credit/stripe')}}
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
				{{__('emails.cartProduct.instructions')}}
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
							{{__('emails.cartProduct.product')}}
						@else
							{{__('emails.cartProduct.credit')}}
						@endif
					@endif
				@endforeach
			</th>
			<th style="padding: 7px;">{{__('emails.cartProduct.quantity')}}</th>
			<th style="padding: 7px;">{{__('emails.cartProduct.price')}}</th>
			<th style="padding: 7px;">{{__('emails.cartProduct.total')}}</th>
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
				<td style="text-align: right;padding: 5px;" colspan="3"><b>{{__('emails.cartProduct.total')}}</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format($payment->amount, 2) }}
				</td>
			</tr>
			<tr style="padding: 2px 5px;">
				<td style="text-align: right;padding: 5px;" colspan="3"><b>{{__('emails.cartProduct.GST')}}</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format(amountGst($payment->amount), 2) }}
				</td>
			</tr>
			<tr style="padding: 2px 5px;">
				<td style="text-align: right;padding: 5px;" colspan="3"><b>{{__('emails.cartProduct.paidAmount')}}</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format($payment->total_amount, 2) }}
				</td>
			</tr>
		@endif		

		@if($payment->payment_type == 1)
			<tr style="padding: 2px 5px;">
				<td style="text-align: right;padding: 5px;" colspan="3"><b>{{__('emails.cartProduct.total')}}</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format($totalAmount, 2) }}
				</td>
			</tr>
			<tr style="padding: 2px 5px;">
				<td style="text-align: right;padding: 5px;" colspan="3"><b>{{__('emails.cartProduct.GST')}}</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format(amountGst($totalAmount), 2) }}
				</td>
			</tr>
			@if(!empty($discountPrice))
				<tr style="padding: 2px 5px;">
					<td style="text-align: right;padding: 5px;" colspan="3"><b>{{__('emails.cartProduct.discount')}}</b></td>
					<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
						${{ number_format($discountPrice, 2) }}
					</td>
				</tr>
			@endif
			<tr style="padding: 2px 5px;">
				<td style="text-align: right;padding: 5px;" colspan="3"><b>{{__('emails.cartProduct.subTotal')}}</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format($payment->total_amount, 2) }}
				</td>
			</tr>
			<tr style="padding: 2px 5px;">
				<td style="text-align: right;padding: 5px;" colspan="3"><b>{{__('emails.cartProduct.useCredit')}}</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format($credit->use ?? 0, 2) }}
				</td>
			</tr>
			<tr style="padding: 2px 5px;">
				<td style="text-align:right;padding: 5px;" colspan="3"><b>{{__('emails.cartProduct.paidAmount')}}</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					$00.00
				</td>
			</tr>
		@endif

		@if($payment->payment_type == 2)
			<tr style="padding: 2px 5px;">
				<td style="text-align: right;padding: 5px;" colspan="3"><b>{{__('emails.cartProduct.total')}}</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format($totalAmount, 2) }}
				</td>
			</tr>
			<tr style="padding: 2px 5px;" >
				<td style="text-align: right;padding: 5px;" colspan="3"><b>{{__('emails.cartProduct.GST')}}</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format(amountGst($totalAmount), 2) }}
				</td>
			</tr>
			@if(!empty($discountPrice))
				<tr style="padding: 2px 5px;">
					<td style="text-align: right;padding: 5px;" colspan="3"><b>{{__('emails.cartProduct.discount')}}</b></td>
					<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
						${{ number_format($discountPrice, 2) }}
					</td>
				</tr>
			@endif
			<tr style="padding: 2px 5px;">
				<td style="text-align: right;padding: 5px;" colspan="3"><b>{{__('emails.cartProduct.subTotal')}}</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format($payment->total_amount, 2) }}
				</td>
			</tr>
			<tr style="padding: 2px 5px;">
				<td style="text-align: right;padding: 5px;" colspan="3"><b>{{__('emails.cartProduct.useCredit')}}</b></td>
				<td style="border-left: 1px solid #d2d2d2;padding: 5px;text-align: center;">
					${{ number_format($credit->use, 2) }}
				</td>
			</tr>
			<tr style="padding: 2px 5px;">
				<td style="text-align: right;padding: 5px;" colspan="3"><b>{{__('emails.cartProduct.paidAmount')}}</b></td>
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