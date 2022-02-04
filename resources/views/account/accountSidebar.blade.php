<div class="col-md-3">
	<h3>{{__('account/accountSidebar.plan')}}</h3>
	<p>
		@if($user->subscribed('main',$user->plan))
		{{ $user->plan  }}
		@endif
	</p>
	{{--
	@if($user->role == 'client' && $user->subscription('main')->onTrial())
	<h3>{{__('account/accountSidebar.onTrial')}}</h3>
	<p>{{__('account/accountSidebar.till')}} {{ $user->subscription('main')->trial_ends_at }} </p>
	@endif 
	--}}
	<h3>{{__('account/accountSidebar.balance')}}</h3>
	<p>{{ config('app.currency_symbol') }} {{ $user->getBalance() }}</p>
	<ul class="nav nav-pills nav-stacked">
		<li><a href="{{ route('orders') }}">{{__('account/accountSidebar.myReports')}}</a></li>
		<li><a href="{{ url('/account/recharge') }}">{{__('account/accountSidebar.recharge')}}</a></li>
		<li><a href="{{ url('/account/updateCard') }}">{{__('account/accountSidebar.updateAccount')}}</a></li>
	</ul>
</div>