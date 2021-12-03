@extends('layouts.adminLayout')

@section('content')

 <h1>CFS Orders</h1>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Order Id</th>
							<th>Report Id</th>
							<th>Address</th>
							<th>Customer Name</th>
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
							<td>{{ $transaction->reportId }}</td>
							<td>{{ $transaction->report->address }}</td>
							<td>
								{{ (isset($transaction->user->firstName)) ? $transaction->user->firstName . $transaction->user->lastName : 'N/A' }}
							</td>
							<td>{{ env('CURRENCY_SYMBOL').$transaction->total/100 }}</td>
							<td class="text-capitalize">{{ $transaction->type }}</td>
							<td>{{ $transaction->created_at }}</td>
							<td><a href="{{URL::Route('reportDetails', ['reportId' => $transaction->reportId, 'userId' => $transaction->userId])}}" >View</a> | 
								<a href="{{URL::Route('reportDetails', ['reportId' => $transaction->reportId, 'userId' => $transaction->userId]).'?edit=address'}}" >Edit</a>
							</td>
						</tr>
						@endforeach
					</tbody>
					
				</table>
				<nav>
					{{ $transactions->links() }}
				</nav>
			</div>

@stop