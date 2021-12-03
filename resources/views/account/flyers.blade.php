@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">My Property Feature Sheet</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      <li class="active">My Property Feature Sheet</li>
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
				<h1>My Property Feature Sheet</h1>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							@if(Auth::User()->user_type == 1)
								<th>Created User</th>
							@endif
							<th>Amount</th>
							<th>Type</th>
							<th>Status</th>
							<th>Dated</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($flyers as $flyer)
						<tr>
							<td>{{ $flyer->id }}</td>
							<td>{{ $flyer->name }}</td>
							@if(Auth::User()->user_type == 1)
								<td>{{ $flyer->user->firstName.' '.$flyer->user->lastName }}</td>
							@endif
							<td>{{ env('CURRENCY_SYMBOL').$flyer->total/100 }}</td>
							<td class="text-capitalize">{{ $flyer->type }}</td>
							<td>{{ ($flyer->status==1) ? 'Active' : 'Inactive' }}</td>
							<td>{{ $flyer->created_at }}</td>
							<td><a href="{{route('flyerDetails', ['flyerId' => $flyer->id, 'userId' => $flyer->user_id])}}">view</a></td>
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
					{{ $flyers->links() }}
				</nav>

				<div class="row">
					<div class="col-md-12 text-center" style="margin-top:25px;">
						<a href="{{ route('orderReport','propertyFeatureSheet') }}" class="btn btn-primary">Create</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


@section('footer_script')
<script type="text/javascript">
    $(document).ready(function(){
        console.log('adnan masood');
    });
</script>
@endsection