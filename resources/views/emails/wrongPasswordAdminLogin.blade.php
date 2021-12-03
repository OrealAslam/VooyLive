@include('emails.sub_views.header')
	<div class="movableContent" style="border: 0px;padding-top: 0px;position: relative;margin: 0;">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr>
				<td height="55"></td>
			</tr>
			<tr>
				<td align="left">
					<div class="contentEditableContainer contentTextEditable" style="margin: 0;">
						<p style="font-size: 15px;">Hi</p>
						<p style="font-size: 15px;">1 Failed Login Attempts From Ip : {{ $ip }}</p>
						<p style="font-size: 15px;">Thank You.</p>
					</div>
				</td>
			</tr>
		</table>
	</div>
@include('emails.sub_views.footer')
