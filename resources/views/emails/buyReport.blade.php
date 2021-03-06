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
						<h2 style="text-align: left;color: #222222;font-size: 19px;font-weight: normal;">{{__('emails/buyReport.hey')}} {{$firstName}} {{$lastName}}</h2>
					</div>
					<div class="contentEditable" align="center" style="margin: 0;">
						<h2 style="text-align: left;color: #222222;font-size: 19px;font-weight: normal;">{{__('emails/buyReport.transactionNumber')}} {{$orderId}}</h2>
					</div>
					<div class="contentEditable" align="center" style="margin: 0;">
						<h2 style="text-align: left;color: #222222;font-size: 19px;font-weight: normal;">{{__('emails/buyReport.para1')}}</h2>
					</div>
					<div class="contentEditable" align="center" style="margin: 0;">
						<table width="100%" border="1">
							<thead>
								<tr>
									<th>{{__('emails/buyReport.address')}}</th>
									<th>{{__('emails/buyReport.amount')}}</th>
									<th>{{__('emails/buyReport.date')}}</th>
									<th>{{__('emails/buyReport.action')}}</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{{$orderReportAddress}}</td>
									<td>{{$orderAmount}}</td>
									<td>{{$orderDate}}</td>
									<td><a href="{{URL::Route('reportDetails', ['reportId' => $reportId, 'userId' => $userId])}}" >{{__('emails/buyReport.view')}}</a></td>
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
			<td align="right">
				<table>
					<tr>
						<td align="center" bgcolor="#1A54BA" style="background:#DC2828; padding:15px 18px;-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">
							<div class="contentEditableContainer contentTextEditable" style="margin: 0;">
								<div class="contentEditable" align="center" style="margin: 0;">
									<a target="_blank" href="{{ URL::Route('orders') }}" class="link2" style="color: #ffffff;font-size: 16px;text-decoration: none;">{{__('emails/buyReport.manageAccount')}}</a>
								</div>
							</div>
						</td>
						<td align="center" bgcolor="#1A54BA" style="background:#DC2828; padding:15px 18px;-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">
							<div class="contentEditableContainer contentTextEditable" style="margin: 0;">
								<div class="contentEditable" align="center" style="margin: 0;">
									<a target="_blank" href="{{ URL::Route('survey') }}" class="link2" style="color: #ffffff;font-size: 16px;text-decoration: none;">{{__('emails/buyReport.takeSurvey')}}</a>
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