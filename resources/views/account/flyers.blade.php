@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">{{__('account/flyers.myPropertyFeatureSheet')}}</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">{{__('account/flyers.home')}}</a></li>
      <li><a href="{{ Route('dashboard') }}">{{__('account/flyers.dashboard')}}</a></li>
      <li class="active">{{__('account/flyers.myPropertyFeatureSheet')}}</li>
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
				<h1>{{__('account/flyers.myPropertyFeatureSheet')}}</h1>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>{{__('account/flyers.id')}}</th>
							<th>{{__('account/flyers.name')}}</th>
							@if(Auth::User()->user_type == 1)
								<th>{{('createdUser')}}</th>
							@endif
							<th>{{__('account/flyers.amount')}}</th>
							<th>{{__('account/flyers.type')}}</th>
							<th>{{__('account/flyers.status')}}</th>
							<th>{{__('account/flyers.dated')}}</th>
							<th>{{__('account/flyers.action')}}</th>
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
							<td><a href="{{route('flyerDetails', ['flyerId' => $flyer->id, 'userId' => $flyer->user_id])}}">{{__('account/flyers.view')}}</a></td>
						</tr>
						@endforeach
					</tbody>
					<!--
					<tfoot>
						<tr>
							<td colspan="3" align="right">{{__('account/flyers.balance')}} {{ config('app.currency_symbol') }}{{ $user->getBalance() }}</td>
						</tr>
					</tfoot>

				-->
				</table>
				<nav>
					{{ $flyers->links() }}
				</nav>

				<div class="row">
					<div class="col-md-12 text-center" style="margin-top:25px;">
						<a href="{{ route('orderReport','propertyFeatureSheet') }}" class="btn btn-primary">{{__('account/flyers.create')}}</a>
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