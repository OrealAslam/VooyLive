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
							
						</div>

						<div class="contentEditable" align="center" style="margin: 0;">
							<h2 style="text-align: left;color: #222222;font-size: 19px;font-weight: normal;">Hey {{$firstName}} {{$lastName}}</h2>
						</div>
						<div class="contentEditable" align="center" style="margin: 0;">
							<h2 style="text-align: left;color: #222222;font-size: 19px;font-weight: normal;">We successfully charged the credit card on file for your  {{$interval}} subscription fees totalling {{$total_amount}} on {{$chrage_date}}.</h2>
						</div>
						<div class="contentEditable" align="center" style="margin: 0;">
							<h2 style="text-align: left;color: #222222;font-size: 19px;font-weight: normal;">Thank you for choosing Community Feature Sheet&reg;. You may view your bills online at any time.<br>As always, feel free to contact us with any questions.</h2>
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
										<a target="_blank" href="{{ url('home') }}" class="link2" style="color: #ffffff;font-size: 16px;text-decoration: none;">Manage Account</a>
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