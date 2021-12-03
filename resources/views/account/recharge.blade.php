@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">Recharge</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      <li class="active">Recharge</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
  <!-- Custom Features -->
  	<div class="cps-section cps-section-padding" id="features">
      	<div class="container">
      		@if (count($errors) > 0)
          <div class="col-md-12">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          </div>
        @endif
			<div class="col-md-12">
				<h1>Account Recharge</h1>
				<form action="{{ url('account/recharge') }}" method="post" class="account-form">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="">Amount</label>
						<input name="amount" class="form-control" placeholder="Any Amount" />
					</div>
					<input type="submit" class="btn btn-primary" name="submit" value="Recharge" />
				</form>
			</div>
		</div>
	</div>
</div>
@endsection