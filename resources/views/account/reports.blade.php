@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">Your Reports</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      <li class="active">Your Reports</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
  <!-- Custom Features -->
  	<div class="cps-section cps-section-padding" id="features">
      	<div class="container">
			<div class="col-md-12">
				<h1>Your Reports</h1>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Adress</th>
							<th>Dated</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($records as $record)
						<tr>
							<td>{{ $record->id }}</td>
							<td>{{App\Report::find($record->id)->address}}</td>
							<td>{{ $record->created_at }}</td>
							<td><a href="{{ URL::Route('reportDetails', (['report_id' => $record->id])) }}" >View</a></td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<td colspan="2" align="left" style="vertical-align: middle;">Total Records = {{ $total_records }}</td>
							<td colspan="2" align="right">{{ $records->links() }}</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection