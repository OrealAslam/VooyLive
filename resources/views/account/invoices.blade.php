@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">{{__('account/invoices.yourInvoices')}}</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">{{('home')}}</a></li>
      <li><a href="{{ Route('dashboard') }}">{{__('account/invoices.dashboard')}}</a></li>
      <li class="active">{{__('account/invoices.yourInvoices')}}</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
  <!-- Custom Features -->
  	<div class="cps-section cps-section-padding" id="features">
      	<div class="container">
			<div class="col-md-12">
				<h1>{{__('account/invoices.yourInvoices')}}</h1>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>{{__('account/invoices.date')}}</th>
							<th>{{__('account/invoices.total')}}</th>
							<th>{{__('account/invoices.action')}}</th>
						</tr>
					</thead>
					<tbody>
						@if(!empty($invoices))
							@foreach($invoices as $invoice)
							    <tr>
							        <td>{{ $invoice->date()->toFormattedDateString() }}</td>
							        <td>{{ $invoice->total() }}</td>
							        <td><a href="/account/invoice/{{ $invoice->id }}">{{__('account/invoices.download')}}</a></td>
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