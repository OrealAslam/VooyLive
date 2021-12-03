@extends('layouts.template')
@section('content')
<style>
.profileimgsec > img {
	border-radius: 0;
	height: unset;
	width: unset;
	max-width: 250px;
}

.list-group-item {
	border: none;
}

</style>
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">Profile View</h2>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}">Home</a></li>
      <li class="active">Profile View</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
  <div class="cps-section cps-section-padding">
    <div class="container">
			<div class="col-md-12">
				<h3>User Detail</h3>
				<div class="col-md-4" style="text-align: center; padding-bottom: 20px; padding-top: 20px;">
					<div class="profileimgsec">
						<img src="{{ url('/'.$details->photo) }}" alt="{{ $user->firstName }} {{ $user->lastName }}">
						<div class="nm">{{ $user->firstName }} {{ $user->lastName }}</div>
					</div>
					<br>
					<ul class="list-group">
				        <li class="list-group-item">
				            <a type="button" class="btn btn-primary" href="{{ url('/account/updateCard') }}">Manage Account</a>
				        </li>
				        <li class="list-group-item">
				            <a type="button" class="btn btn-primary" href="{{ url('/account/transactions') }}">My Reports</a>
				        </li>
				    </ul>
				</div>
				<div class="col-md-8" style="padding-top: 20px; padding-bottom: 20px;">
					<div class="profiledetail">
						<div class="contactinfo">
							<div class="profile-detail-row row" style="border: 0px;">
								<div class="col-md-12 ttl">Client Logo</div>
							</div>
							<div class="profile-detail-row row" style="border: 0px;">
								<img src="{{url('/'.$details->logo)}}" alt="{{ $details->title }}" style="max-width: 300px;">
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-12 ttl">Contact Information</div>
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-4 ud_ttl">Email</div>
								<div class="col-md-8 ud_dtl">{{ $user->email }}</div>
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-4 ud_ttl">Name</div>
								<div class="col-md-8 ud_dtl">{{ $user->firstName }} {{ $user->lastName }}</div>
							</div>
							<div class="pfl_edit"><a href="{{ url('/account/profile') }}" class="btn btn-primary">Update Profile</a></div>
						</div>
						<div class="additionalinfo">
							<div class="profile-detail-row row">
								<div class="col-md-12 ttl">Additional Information</div>
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-4 ud_ttl">Title</div>
								<div class="col-md-8 ud_dtl">{{ $details->title }}</div>
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-4 ud_ttl">Region</div>
								<div class="col-md-8 ud_dtl">{{ $cityArray[$user->region] }}</div>
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-4 ud_ttl">Contact Phone</div>
								<div class="col-md-8 ud_dtl">{{ $details->phone }}</div>
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-4 ud_ttl">Work Email</div>
								<div class="col-md-8 ud_dtl">{{ $user->email }}</div>
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-4 ud_ttl">Plan</div>
								@if(!empty($plan->name))
									<div class="col-md-8 ud_dtl">{{ $plan->name }}</div>
								@endif
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-4 ud_ttl">Color #1</div>
								<div class="col-md-8 ud_dtl">(Headings, walk distance icon)<input type="text" name="colora" disabled="disabled" class="form-control colora" style="width: 50px; background-color:{{ isset($details->colora) ? $details->colora : 'rgb(0, 0, 0)'}}"/></div>
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-4 ud_ttl">Color #2</div>
								<div class="col-md-8 ud_dtl">(Sub-Headings, section icons)<input type="text" name="colorb" disabled="disabled" class="form-control colorb" style="width: 50px;background-color:{{ isset($details->colorb) ? $details->colorb : 'rgb(0, 0, 0)'}}"/></div>
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-4 ud_ttl">Color #3</div>
								<div class="col-md-8 ud_dtl">(Footer background color)<input type="text" name="colorc" disabled="disabled" class="form-control colorc" style="width: 50px;background-color:{{ isset($details->colorc) ? $details->colorc : 'rgb(0, 0, 0)'}}"/></div>
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-4 ud_ttl">Color #4</div>
								<div class="col-md-8 ud_dtl">(Background Color 1)<input type="text" name="colord" disabled="disabled" class="form-control colord" style="width: 50px;background-color:{{ isset($details->colord) ? $details->colord : 'rgb(80, 86, 100)'}}"/></div>
							</div>
							<div class="profile-detail-row row">
								<div class="col-md-4 ud_ttl">Color #5</div>
								<div class="col-md-8 ud_dtl">(Background Color 2)<input type="text" name="colore" disabled="disabled" class="form-control colore" style="width: 50px;background-color:{{ isset($details->colore) ? $details->colore : 'rgb(199, 217, 35)'}}"/></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection