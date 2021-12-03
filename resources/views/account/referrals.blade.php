@extends('layouts.template')
@section('content')
<link href="/newPlugin/toastr.min.css" rel="stylesheet"/>

<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">My Referral</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      <li class="active">My Referral</li>
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
				<h1>My Referral</h1>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>User Name</th>
							<th>Email</th>
							<th>Dated</th>
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
							<td colspan="3" align="right">Balance {{ config('app.currency_symbol') }}{{ $user->getBalance() }}</td>
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

