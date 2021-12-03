@extends('layouts.adminLayout')

@section('content')

 <h1>PFS Orders</h1>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>PFS Name</th>
							<th>Customer Name</th>
							<th>Amount</th>
							<th>Type</th>
							<th>Dated</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($flyers as $flyer)
						<tr>
							<td>{{ $flyer->id }}</td>
							<td>{{ $flyer->name }}</td>
							<td>
								{{ (isset($flyer->User->firstName)) ? $flyer->User->firstName .' '. $flyer->User->lastName : 'N/A' }}
							</td>
							<td>{{ env('CURRENCY_SYMBOL').$flyer->total/100 }}</td>
							<td class="text-capitalize">{{ $flyer->type }}</td>
							<td>{{ $flyer->created_at }}</td>
							<td><a href="{{URL::Route('flyerDetails', ['flyerId' => $flyer->id, 'userId' => $flyer->user_id])}}">view</a></td>
						</tr>
						@endforeach
					</tbody>
					
				</table>
				<nav>
					{{ $flyers->links() }}
				</nav>
			</div>

@stop