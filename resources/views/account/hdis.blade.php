@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">My House Details Infographic</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      <li class="active">House Details Infographic</li>
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
				<h1>My Home Details Infographic</h1>
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
						@foreach($hdis as $hdi)
						<tr>
							<td>{{ $hdi->id }}</td>
							<td>{{ $hdi->name }}</td>
							@if(Auth::User()->user_type == 1)
								<td>{{ $hdi->user->firstName.' '.$hdi->user->lastName }}</td>
							@endif
							<td>{{ env('CURRENCY_SYMBOL').$hdi->total/100 }}</td>
							<td class="text-capitalize">{{ $hdi->type }}</td>
							<td>{{ ($hdi->status==1) ? 'Active' : 'Inactive' }}</td>
							<td>{{ $hdi->created_at }}</td>
							<td><a href="{{route('hdiDetails', ['hdiId' => $hdi->id, 'userId' => $hdi->user_id])}}">view</a></td>
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
					{{ $hdis->links() }}
				</nav>

				<div class="row">
					<div class="col-md-12 text-center" style="margin-top:25px;">
						<a href="{{Route('orderReport','houseDetailsInfographic')}}" class="btn btn-primary">Create</a>
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