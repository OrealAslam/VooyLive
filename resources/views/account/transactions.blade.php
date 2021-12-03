@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">My Reports</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      <li class="active">My Reports</li>
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
				<h1>My Reports</h1>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							@if(Auth::User()->user_type == 1)
								<th>Created User</th>
							@endif
							<th>Address</th>
							<th>Amount</th>
							<th>Type</th>
							<th>Dated</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($transactions as $transaction)
						<tr>
							<td>{{ $transaction->orderId }}</td>
							@if(Auth::User()->user_type == 1)
								<td>{{ $transaction->user->firstName.' '.$transaction->user->lastName }}</td>
							@endif
							<td>{{ !empty($transaction->custom_report_address) ? $transaction->custom_report_address : $transaction->report->address }}</td>
							<td>{{ env('CURRENCY_SYMBOL').$transaction->total/100 }}</td>
							<td class="text-capitalize">{{ $transaction->type }}</td>
							<td>{{ $transaction->created_at }}</td>
							<td>
								<a href="{{route('reportNotes', ['reportId' => $transaction->reportId])}}">Notes</a>
								|
								<a href="{{route('reportDetails', ['reportId' => $transaction->reportId, 'userId' => $transaction->userId])}}">view</a>
							</td>
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
					{{ $transactions->links() }}
				</nav>

				<div class="row">
					<div class="col-md-12 text-center">
						<a href="{{ route($name) }}" class="btn btn-primary">Run</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="cps-main-wrap">
  <!-- Custom Features -->
  	<div class="cps-section cps-section-padding" id="features">
      	<div class="container">
			<div class="col-md-12">
				<h1>Custom Reports</h1>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Product Name</th>
							<th>Amount</th>
							<th>Address</th>
							<th>Neighbourhood</th>
							<th>Purchase Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if(!empty($product))
							@foreach($product as $key=>$value)
								@if($value->product_type == 1)
									<tr>
										<td>{{ ++$key }}</td>
										<td>{{ $value->product->name ?? '-' }}</td>
										<td>${{ $value->amount ?? '-' }}</td>
										<td>{{ $value->address ?? '-' }}</td>
										<td>{{ $value->neighborhood ?? '-' }}</td>
										<td>{{ $value->created_at ?? '-' }}</td>
										<td><a href="{{ route('product.detail',$value->id) }}">View</a></td>
									</tr>
								@endif
							@endforeach
						@endif
					</tbody>
				</table>
				<div class="row">
					<div class="col-md-12 text-center">
						<a href="{{ url('/order/'.$cat->slug) }}" class="btn btn-primary">Order</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection