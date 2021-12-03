@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">Profile</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      <li class="active">Profile</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
    <div class="cps-section cps-section-padding">
        <div class="container">
			<div class="col-md-12">
				<h1>My Profile</h1>

                    @include('common.errors')
                    @include('common.success')

					<form action="{{ url('account/profile') }}" method="post" class="account-form" enctype="multipart/form-data" >
						{{ csrf_field() }}
						
						<div class="form-group">
							<label>Title (That Appears In Footer Of Report)</label>
							<input type="text" name="title" value="{{ $details->title }}" class="form-control" required>
						</div>
					
						<div class="form-group">
							<label>Contact Email (That Appears In Footer Of Report)</label>
							<input type="text" name="email" value="{{ old('email',  isset($details->email) ? $details->email : null) }}" class="form-control" required>
							{{ old('firstName') }}
						</div>			
						<div class="form-group">
							<label>Contact Phone (That Appears In Footer Of Report)</label>

							<input type="text" name="phone" value="{{ old('phone',  isset($details->phone) ? $details->phone : null) }}" class="form-control" required>
						</div>
						@if($details->logo!=null)
							<img src="{{url('/'.$details->logo)}}" style="max-height: 150px">
						@endif
						<div class="form-group">
							<label>Agency Logo (That Appears In Header Of Report) Max Size 1mb</label>
							<input type="file" name="logo" class="form-control">
						</div>
						<hr>
						@if($details->photo!=null)

						<img src="{{url('/'.$details->photo) }}" style="max-height: 150px">
						@endif

						<div class="form-group">
							<label>Contact Photo (That Appears In Footer Of Report) Max Size 1mb</label>
							<input type="file" name="photo" class="form-control">
						</div>
						<hr>
						<label>Color #1 (Headings, walk distance icon)</label>
						<div id="colora" class="input-group colorpicker-component showcolorpicker" data-color="{{ old('colora',  isset($details->colora) ? $details->colora : 'rgb(0, 0, 0)') }}" title="Color #1">
						  <input type="text" name="colora" class="form-control colora" style="background-color:{{ old('colora',  isset($details->colora) ? $details->colora : 'rgb(0, 0, 0)') }}"/>
						  <span class="input-group-addon"><i></i></span>
						</div>

						<label>Color #2 (Sub-Headings, section icons)</label>
						<div id="colorb" class="input-group colorpicker-component showcolorpicker" data-color="{{ old('colorb',  isset($details->colorb) ? $details->colorb : 'rgb(0, 0, 0)') }}" title="Color #2">
						  <input type="text" name="colorb" class="form-control colorb" style="background-color:{{ old('colorb',  isset($details->colorb) ? $details->colorb : 'rgb(0, 0, 0)') }}"/>
						  <span class="input-group-addon"><i></i></span>
						</div>

						<label>Color #3 (Footer background color)</label>
						<div id="colorc" class="input-group colorpicker-component showcolorpicker" data-color="{{ old('colorc',  isset($details->colorc) ? $details->colorc : 'rgb(255, 255, 255)') }}" title="Color #3">
						  <input type="text" name="colorc" class="form-control colorc" style="background-color:{{ old('colorc',  isset($details->colorc) ? $details->colorc : 'rgb(255, 255, 255)') }}"/>
						  <span class="input-group-addon"><i></i></span>
						</div>

						<label>Color #4 (Background Color 1)</label>
						<div id="colord" class="input-group colorpicker-component showcolorpicker" data-color="{{ old('colord',  isset($details->colord) ? $details->colord : 'rgb(80, 86, 100)') }}" title="Color #4">
							<input type="text" name="colord" class="form-control colord" style="background-color:{{ old('colord',  isset($details->colord) ? $details->colord : 'rgb(80, 86, 100)') }}"/>
							<span class="input-group-addon"><i></i></span>
						</div>

						<label>Color #5 (Background Color 2)</label>
						<div id="colore" class="input-group colorpicker-component showcolorpicker" data-color="{{ old('colore',  isset($details->colore) ? $details->colore : 'rgb(199, 217, 35)') }}" title="Color #5">
							<input type="text" name="colore" class="form-control colore" style="background-color:{{ old('colore',  isset($details->colore) ? $details->colore : 'rgb(199, 217, 35)') }}"/>
							<span class="input-group-addon"><i></i></span>
						</div>


						<div class="form-group">
							
							<input type="submit" class="btn btn-primary">
						</div>

					</form>
				
			</div>
		</div>
	</div>
</div>
@endsection