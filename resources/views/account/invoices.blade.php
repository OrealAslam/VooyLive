@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">Your Invoices</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      <li class="active">Your Invoices</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
  <!-- Custom Features -->
  	<div class="cps-section cps-section-padding" id="features">
      	<div class="container">
			<div class="col-md-12">
				<h1>Your Invoices</h1>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Date</th>
							<th>Total</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if(!empty($invoices))
							@foreach($invoices as $invoice)
							    <tr>
							        <td>{{ $invoice->date()->toFormattedDateString() }}</td>
							        <td>{{ $invoice->total() }}</td>
							        <td><a href="/account/invoice/{{ $invoice->id }}">Download</a></td>
							    </tr>
							@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection