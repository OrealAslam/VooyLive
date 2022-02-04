@extends('layouts.layout')
@section('content')
<div class="col-md-6">
	<h1>{{__('account/account.myAccount')}}</h1>
	<ul class="nav nav-pills nav-stacked">
		<li><a href="{{ url('account/password') }}">{{__('account/account.changePassword')}}</a></li>
		<li><a href="{{ url('account/profile') }}">{{__('account/account.editProfile')}}</a></li>
		<li><a href="{{ url('account/updateCard') }}">{{__('account/account.manageAccount')}}</a></li>
		<li><a href="{{ url('account/logout') }}">{{__('account/account.signOut')}}</a></li>
		<li><a href=""></a></li>
	</ul>
</div>	
{!! $sidebar !!}
@endsection