@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">{{__('account/transactions.myReports')}}</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">{{__('account/transactions.home')}}</a></li>
      <li><a href="{{ Route('dashboard') }}">{{__('account/transactions.dashboard')}}</a></li>
      <li class="active">{{__('account/transactions.myReports')}}</li>
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
				<h1>{{__('account/transactions.myReports')}}</h1>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>{{__('account/transactions.id')}}</th>
							@if(Auth::User()->user_type == 1)
								<th>{{__('account/transactions.createdUser')}}</th>
							@endif
							<th>{{__('account/transactions.address')}}</th>
							<th>{{__('account/transactions.amount')}}</th>
							<th>{{__('account/transactions.type')}}</th>
							<th>{{__('account/transactions.dated')}}</th>
							<th>{{__('account/transactions.action')}}</th>
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
								<a href="{{route('reportNotes', ['reportId' => $transaction->reportId])}}">{{__('account/transactions.notes')}}</a>
								|
								<a href="{{route('reportDetails', ['reportId' => $transaction->reportId, 'userId' => $transaction->userId])}}">{{__('account/transactions.view')}}</a>
							</td>
						</tr>
						@endforeach
					</tbody>
					<!--
					<tfoot>
						<tr>
							<td colspan="3" align="right">{{__('account/transactions.balance')}} {{ config('app.currency_symbol') }}{{ $user->getBalance() }}</td>
						</tr>
					</tfoot>

				-->
				</table>
				<nav>
					{{ $transactions->links() }}
				</nav>

				<div class="row">
					<div class="col-md-12 text-center">
						<a href="{{ route($name) }}" class="btn btn-primary">{{__('account/transactions.run')}}</a>
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
				<h1>{{__('account/transactions.customReports')}}</h1>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>{{__('account/transactions.id')}}</th>
							<th>{{('productName')}}</th>
							<th>{{__('account/transactions.amount')}}</th>
							<th>{{__('account/transactions.address')}}</th>
							<th>{{__('account/transactions.neighbourhood')}}</th>
							<th>{{__('account/transactions.purchaseDate')}}</th>
							<th>{{__('account/transactions.action')}}</th>
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
										<td><a href="{{ route('product.detail',$value->id) }}">{{__('account/transactions.view')}}</a></td>
									</tr>
								@endif
							@endforeach
						@endif
					</tbody>
				</table>
				<div class="row">
					<div class="col-md-12 text-center">
						<a href="{{ url('/order/'.$cat->slug) }}" class="btn btn-primary">{{__('account/transactions.order')}}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection