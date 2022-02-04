@include('emails/sub_views.header')
	<div class="movableContent" style="border: 0px;padding-top: 0px;position: relative;margin: 0;">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr>
				<td height="55"></td>
			</tr>
			<tr>
				<td align="left">
					<div class="contentEditableContainer contentTextEditable" style="margin: 0;">
						<div class="contentEditable" align="center" style="margin: 0;">
							<h2 style="text-align: left;color: #222222;font-size: 19px;font-weight: normal;">{{__('emails/accountActivation.para1')}}</h2>
						</div>
						<div class="contentEditable" align="center" style="margin: 0;">
							<h2 style="text-align: left;color: #222222;font-size: 19px;font-weight: normal;">{{__('emails/accountActivation.id')}}  {{$user->userId}}</h2>
							<h2 style="text-align: left;color: #222222;font-size: 19px;font-weight: normal;">{{__('emails/accountActivation.name')}}  {{$firstName}} {{$lastName}}</h2>
							<h2 style="text-align: left;color: #222222;font-size: 19px;font-weight: normal;">{{__('emails/accountActivation.email')}}  {{$user->email}}</h2>
							<h2 style="text-align: left;color: #222222;font-size: 19px;font-weight: normal;">{{__('emails/accountActivation.region')}}  {{$user->region}}</h2>
							<h2 style="text-align: left;color: #222222;font-size: 19px;font-weight: normal;">{{__('emails/accountActivation.created')}}  {{\Carbon\Carbon::parse($user->created_at)->format('Y-m-d')}}</h2>
		                    @if($user->subscription('main')->onTrial())
							<h2 style="text-align: left;color: #222222;font-size: 19px;font-weight: normal;">{{__('emails/accountActivation.type')}}  {{__('emails/accountActivation.trial')}}</h2>
							<h2 style="text-align: left;color: #222222;font-size: 19px;font-weight: normal;">{{__('emails/accountActivation.activate')}}  {{\Carbon\Carbon::parse($user->subscription('main')->created_at)->format('Y-m-d')}}</h2>
							<h2 style="text-align: left;color: #222222;font-size: 19px;font-weight: normal;">{{__('emails/accountActivation.expired')}}  {{\Carbon\Carbon::parse($user->subscription('main')->trial_ends_at)->format('Y-m-d')}}</h2>
							@else
							<h2 style="text-align: left;color: #222222;font-size: 19px;font-weight: normal;">{{__('emails/accountActivation.type')}}  {{__('emails/accountActivation.paid')}}</h2>
							<h2 style="text-align: left;color: #222222;font-size: 19px;font-weight: normal;">{{__('emails/accountActivation.activate')}} :-  {{\Carbon\Carbon::parse($user->subscription('main')->created_at)->format('Y-m-d')}}</h2>
							<h2 style="text-align: left;color: #222222;font-size: 19px;font-weight: normal;">{{__('emails/accountActivation.expired')}}  {{\Carbon\Carbon::parse($user->subscription('main')->renews_at)->format('Y-m-d')}}</h2>
		                    @endif
						</div>
						<div class="contentEditable" align="center" style="margin: 0;">
							<h2 style="text-align: left;color: #222222;font-size: 19px;font-weight: normal;">{{__('emails/accountActivation.plan')}}  {{$plan}}</h2>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td height="15"> </td>
			</tr>
		</table>
	</div>
@include('emails/sub_views.footer')
