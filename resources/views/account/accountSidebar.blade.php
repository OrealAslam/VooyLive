<div class="col-md-3">
	<h3>Plan</h3>
	<p>
		@if($user->subscribed('main',$user->plan))
		{{ $user->plan  }}
		@endif
	</p>
	{{--
	@if($user->role == 'client' && $user->subscription('main')->onTrial())
	<h3>On Trial</h3>
	<p>Till {{ $user->subscription('main')->trial_ends_at }} </p>
	@endif 
	--}}
	<h3>Balance:</h3>
	<p>{{ config('app.currency_symbol') }} {{ $user->getBalance() }}</p>
	<ul class="nav nav-pills nav-stacked">
		<li><a href="{{ route('orders') }}">My Reports</a></li>
		<li><a href="{{ url('/account/recharge') }}">Recharge</a></li>
		<li><a href="{{ url('/account/updateCard') }}">Update Account</a></li>
	</ul>
</div>