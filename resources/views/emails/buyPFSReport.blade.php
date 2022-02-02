@include('emails.sub_views.header')
<div class="movableContent" style="border: 0px;padding-top: 0px;position: relative;margin: 0;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
		<tr>
			<td height="55"></td>
		</tr>
		<tr>
			<td align="left">
				<div class="contentEditableContainer contentTextEditable" style="margin: 0;">
					<div class="contentEditable" align="center" style="margin: 0;">
						<h2 style="text-align: left;color: #222222;font-size: 19px;font-weight: normal;">{{__('emails.buyPFSReport.hey')}} {{$firstName}} {{$lastName}}</h2>
					</div>
					<div class="contentEditable" align="center" style="margin: 0;">
						<h2 style="text-align: left;color: #222222;font-size: 19px;font-weight: normal;">{{__('emails.buyPFSReport.para1')}}</h2>
					</div>
					<div class="contentEditable" align="center" style="margin: 0;">
						<table width="100%" border="1">
							<thead>
								<tr>
									<th>{{__('emails.buyPFSReport.name')}}</th>
									<th>{{__('emails.buyPFSReport.amount')}}</th>
									<th>{{__('emails.buyPFSReport.date')}}</th>
									<th>{{__('emails.buyPFSReport.action')}}</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{{$flyerName}}</td>
									<td>{{$amount}}</td>
									<td>{{$flyerDate}}</td>
									<td><a href="{{route('flyerDetails', ['flyerId' => $flyerId, 'userId' => $userId])}}">{{__('emails.buyPFSReport.view')}}</a></td>
								</tr>
							</tbody>
						</table>
					</div>


				</div>
			</td>
		</tr>
		<tr>
			<td height="15"> </td>
		</tr>
		<tr>
			<td align="center">
				<table>
					<tr>
						<td align="center" bgcolor="#1A54BA" style="background:#DC2828; padding:15px 18px;-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">
							<div class="contentEditableContainer contentTextEditable" style="margin: 0;">
								<div class="contentEditable" align="center" style="margin: 0;">
									<a target="_blank" href="{{ URL::Route('flyers-list') }}" class="link2" style="color: #ffffff;font-size: 16px;text-decoration: none;">{{__('emails.buyPFSReport.manageAccount')}}</a>
								</div>
							</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
@include('emails.sub_views.footer')