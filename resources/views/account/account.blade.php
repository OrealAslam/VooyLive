@extends('layouts.layout')
@section('content')
<div class="col-md-6">
	<h1>My Account</h1>
	<ul class="nav nav-pills nav-stacked">
		<li><a href="{{ url('account/password') }}">Change Password</a></li>
		<li><a href="{{ url('account/profile') }}">Edit Profile</a></li>
		<li><a href="{{ url('account/updateCard') }}">Manage Account</a></li>
		<li><a href="{{ url('account/logout') }}">Sign Out</a></li>
		<li><a href=""></a></li>
	</ul>
</div>	
{!! $sidebar !!}
@endsection