@include('emails.sub_views.header')
<div style="width:100% !important;margin-top:15px;">
	<table class="table" style="width:100% !important;border:1px solid #d2d2d2;border-collapse: collapse;">
		<tr  style="background:#d2d2d2;">
			<th style="padding:7px;text-align:left;font-size: 16px;">
				{{__('emails.userPurchesProduct.creditDetails')}}
			</th>
			<th style="padding:7px;text-align:left;"></th>
		</tr>
		<tr>
			<td width="100%" style="display: none;">	
				<div style="width:102% !important; border-collapse: separate;">
					<tr style="width:100% !important;">
						<td style="padding:15px;border:1px solid #d2d2d2;">
						<p style="padding:0px 15px 8px 0px;margin:0px;">{{('remainingCredit')}} <strong>${{ $userCredit }}</strong> <a href="{{ url('/order/'.$orderMoreCredit->slug) }}?type=orderMoreCredit" style="background-color: #ea2349;color:#fff;border-radius:15px;padding:4px 7px;font-size:10px;text-decoration: none;margin-left: 10px;" class="btn btn-primary">{{__('emails.userPurchesProduct.getMoreCredit')}}</a></p>
						</td>
						<td style="border:1px solid #d2d2d2;">
						<p style="padding:0px 15px 8px 0px;margin:0px;"><a href="{{ URL::Route('survey') }}" style="background-color: #ea2349;color:#fff;border-radius:15px;padding:4px 7px;font-size:10px;text-decoration: none;margin-left: 10px;" class="btn btn-primary">{{__('emails.userPurchesProduct.takeSurvey')}}</a></p>
						</td>
					</tr>
				</div>
			</td>
		</tr>
	</table>
</div>
<div style="width:100%">
	<table class="table" style="margin: 21px 0px;width:100%;border:1px solid #d2d2d2;border-collapse: collapse;">
		<tr>
			<td style="padding:10px;">
				<div class="movableContent" style="border: 0px;padding-top: 0px;position: relative;margin: 0;">
					<ul style="list-style:none;margin:0px;padding: 0px;font-size:14px;">
						<li style="margin:0px;padding: 0px;">{{__('emails.userPurchesProduct.productName')}} {{ $productName }}</li>
						<li style="margin:0px;padding: 0px;">{{__('emails.userPurchesProduct.address')}} {{ $address }}</li>
						<li style="margin:0px;padding: 0px;">{{__('emails.userPurchesProduct.neighborhood')}} {{ $neighborhood }}</li>
					</ul>
					{!! $note !!}
				</div>
			</td>
		</tr>
	</table>
</div>
@if(!empty($file))
<div style="width:100%;margin-top:15px;">
	<table class="table" style="width:100%;border:1px solid #d2d2d2;border-collapse: collapse;">
		<tr  style="background:#d2d2d2;">
			<th style="padding:7px;text-align:left;font-size: 16px;">
				{{__('emails.userPurchesProduct.downloadAttachmentFile')}}
			</th>
			<th style="padding:7px;text-align:left;"></th>
		</tr>
		<tr>
			<td width="100%" style="display: none;">	
				<div style="width:102% !important; border-collapse: separate;">
					<tr style="width:100% !important;">
						<th style="padding:7px 15px;text-align:left;border:1px solid #d2d2d2;">{{__('emails.userPurchesProduct.fileName')}}</th>
						<th style="padding:7px 15px;text-align:center;border:1px solid #d2d2d2;">{{__('emails.userPurchesProduct.download')}}</th>
					</tr>
					<tr style="width:100% !important;">
						@foreach($file as $k => $fileName)
							<td style="padding:15px;border:1px solid #d2d2d2;" width="80%">
								{{ $fileName }}
							</td>
							<td style="text-align: center !important;border:1px solid #d2d2d2;" width="20%">
								<a href="{{ route('doc.download', ['file' => $fileName]) }}" style="color: #fff !important;background-color: #ea2349;border-radius:10px;padding:4px 8px;font-size:12px;text-decoration: none;" class="btn btn-primary">{{__('emails.userPurchesProduct.download')}}</a><br/>
							</td>
						@endforeach
					</tr>
				</div>
			</td>
		</tr>
	</table>
</div>
@endif
@include('emails.sub_views.footer')