@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">Invite Another REALTORS®</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      <li class="active">Invite Another REALTORS®</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
  <!-- Custom Features -->
  	<div class="cps-section cps-section-padding" id="features">
      	<div class="container">
			<div class="col-md-12">
                <div class="row">
	                <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
						<form id="contactForm" class="cps-contact-form style-2" action="{{ route('invite.realtor') }}" method="post">
                    	{{ csrf_field() }}
                            <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3">
                                @include('common.success')
                            </div>
	                    	<div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3">
	                    		<label>Invite Another REALTOR®</label>
	                            <input id="email" type="email" name="email" placeholder="Enter Email" required>
	                        </div>
	                        <div class="col-md-2 col-sm-12 col-xs-12 text-right col-md-offset-5 mt-10">
	                            <button type="submit" class="btn btn-primary">Send</button>
	                        </div>
                    	</form>
	                </div>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection