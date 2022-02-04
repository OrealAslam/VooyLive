@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">Report</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      <li class="active">Report Notes</li>
    </ol>
  </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
    <div class="cps-section cps-section-padding">
        <div class="container">
			<div class="col-md-12">
				<h1>{{__('account/reportNotes.reportNotes')}}</h1>
                @include('common.errors')
                @include('common.success')
				<form action="{{ URL::Route('reportNotes', ['reportId'=>$reportId]) }}" method="post" class="report-notes-form" >
					{{ csrf_field() }}

					<div class="form-group">
						<label>{{__('account/reportNotes.reportAddress')}}</label>
					</div>
					<div class="form-group">
						<label>{{__('account/reportNotes.point1')}} <span id="char_count1" style="color: green"></span></label>
						<textarea class="form-control" name="point_1" id="point_1" placeholder="{{$defaultPoints[1]}}" onFocus="countChars('point_1','char_count1',255)" onKeyDown="countChars('point_1','char_count1',255)" onKeyUp="countChars('point_1','char_count1',255)">{{ $all_points[1] }}</textarea>
					</div>
					<div class="form-group">
						<label>{{__('account/reportNotes.point2')}} <span id="char_count2" style="color: green"></span></label>
						<textarea class="form-control" name="point_2" id="point_2" placeholder="{{$defaultPoints[2]}}" onFocus="countChars('point_2','char_count2',255)" onKeyDown="countChars('point_2','char_count2',255)" onKeyUp="countChars('point_2','char_count2',255)">{{ $all_points[2] }}</textarea>
					</div>
					<div class="form-group">
						<label>{{__('account/reportNotes.point3')}} <span id="char_count3" style="color: green"></span></label>
						<textarea class="form-control" name="point_3" id="point_3" placeholder="{{$defaultPoints[3]}}" onFocus="countChars('point_3','char_count3',255)" onKeyDown="countChars('point_3','char_count3',255)" onKeyUp="countChars('point_3','char_count3',255)">{{ $all_points[3] }}</textarea>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Submit">
						<a class="btn btn-default" href="{{route('reportDetails', ['reportId' => $reportId, 'userId' => $userId, 'template' => 'metro'])}}">{{__('account/reportNotes.goBackReport')}}</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
function countChars(textbox, counter, max) {
	var count = max - document.getElementById(textbox).value.length;
	if (count < 0) {
		document.getElementById(counter).innerHTML = "<span style=\"color: red;\"> (" + count +"/"+ max + ") </span>";
	} else {
		document.getElementById(counter).innerHTML = "(" + count +"/"+ max + ")";
	}
}
countChars('point_1','char_count1',255);
countChars('point_2','char_count2',255);
countChars('point_3','char_count3',255);
</script>


@endsection