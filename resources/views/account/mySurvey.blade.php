@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">My Surveys</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      <li class="active">My Surveys</li>
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
                <div class="row">
	                <div class="col-md-6">
						<h1>My Surveys</h1>
	                </div>
	                <div class="col-md-6">
						<a href="{{ route('survey') }}" class="btn btn-primary" style="float: right;margin-top: 40px; margin-bottom: 10px;">Create Survey</a>
	                </div>
                </div>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Creation Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($surveys as $key => $survey)
						<tr>
							<td width="80">{{ ++$key }}</td>
							<td>{{ date('d-m-Y', strtotime($survey->created_at)) }}</td>
							<td width="80">
								@php
									$createdDate = $survey->created_at;
									$currentDate = date('Y-m-d');
            						$currentDate = date('Y-m-d', strtotime($currentDate));
            						$startDate = date('Y-m-d', strtotime($createdDate->startOfWeek()));
            						$endDate = date('Y-m-d', strtotime($createdDate->endOfWeek()));
								@endphp
								@if(($currentDate >= $endDate))
									<a href="{{route('my.surveys.show', $survey)}}">view</a>
								@else
									<a href="" class="current-survey">view</a>
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<nav>
					{{ $surveys->links() }}
				</nav>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="display: inline;">Survey still open</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12 text-center survey-model-text">
                <div class="row">
                    <div class="col-md-12">
                        <p>Surveys are ready on Mondays. This is to allow other REALTORS® in your city to take the survey so we can get the most accurate picture of the market.</p>
                    </div>
                    <div class="col-md-12">
                    	<br>
                        <a href="{{ route('invite.another.realtor') }}" class="btn btn-primary">Invite another REALTOR®</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- model success -->
@endsection
@section('footer_script')
<script type="text/javascript">
	$('.current-survey').on('click', function (e) {
		e.preventDefault();
		$('#exampleModalCenter').modal('show');
	})
</script>
@endsection