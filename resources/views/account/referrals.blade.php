@extends('layouts.template')
@section('content')
<link href="/newPlugin/toastr.min.css" rel="stylesheet"/>

<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">{{__('account/referrals.myReferral')}}</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">{{__('account/referrals.home')}}</a></li>
      <li><a href="{{ Route('dashboard') }}">{{__('account/referrals.dashboard')}}</a></li>
      <li class="active">{{__('account/referrals.myReferral')}}</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">

  <!-- Custom Features -->
  	<div class="cps-section cps-section-padding" id="features">
      	<div class="container">
			<div class="col-md-12">
                @include('common.errors')
                @include('common.success')
				<!-- <a href="{{ url('/transactions/pdf') }}">Download PDF</a> -->
				<h1>{{__('account/referrals.myReferral')}}</h1>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>{{__('account/referrals.id')}}</th>
							<th>{{__('account/referrals.userName')}}</th>
							<th>{{__('account/referrals.email')}}</th>
							<th>{{__('account/referrals.dated')}}</th>
						</tr>
					</thead>
					<tbody>
						@foreach($referrals as $referral)
						<tr>
							<td>{{ $referral->id }}</td>
							<td>{{ $referral->user->firstName.' '.$referral->user->lastName}}</td>
							<td>{{ $referral->user->email }}</td>
							<td>{{ $referral->created_at }}</td>
						</tr>
						@endforeach
					</tbody>
					<!--
					<tfoot>
						<tr>
							<td colspan="3" align="right">{{__('account/referrals.balance')}} {{ config('app.currency_symbol') }}{{ $user->getBalance() }}</td>
						</tr>
					</tfoot>

				-->
				</table>
				<nav>
					{{ $referrals->links() }}
				</nav>
			</div>
		</div>
	</div>
</div>
@endsection


@section('footer_script')

@endsection

