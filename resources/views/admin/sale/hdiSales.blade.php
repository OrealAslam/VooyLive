@extends('layouts.adminLayout')

@section('content')

 <h1>HDI Orders</h1>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Hdi Name</th>
							<th>Customer Name</th>
							<th>Amount</th>
							<th>Type</th>
							<th>Dated</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($hdis as $hdi)
						<tr>
							<td>{{ $hdi->id }}</td>
							<td>{{ $hdi->name }}</td>
							<td>
								{{ (isset($hdi->User->firstName)) ? $hdi->User->firstName .' '. $hdi->User->lastName : 'N/A' }}
							</td>
							<td>{{ env('CURRENCY_SYMBOL').$hdi->total/100 }}</td>
							<td class="text-capitalize">{{ $hdi->type }}</td>
							<td>{{ $hdi->created_at }}</td>
							<td><a href="{{URL::Route('hdiDetails', ['hdiId' => $hdi->id, 'userId' => $hdi->user_id])}}">view</a></td>
						</tr>
						@endforeach
					</tbody>
					
				</table>
				<nav>
					{{ $hdis->links() }}
				</nav>
			</div>

@stop