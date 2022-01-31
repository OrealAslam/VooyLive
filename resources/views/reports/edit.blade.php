@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">Manage Account</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">Home</a></li>
      <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
      <li class="active">Edit Report</li>
    </ol>
  </div>
</div>

<div class="container">

    <form action="{{url('report/save')}}/{{$id}}" method="post" class="col-lg-offset-1 col-md-10">
        {{csrf_field()}}
        <div class="form-group">
            <label for="" class="control-label">Households With Children</label>
            <input type="text" name="households_with_children" id="" class="form-control" value="{{$report->households_with_children}}" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="" class="control-label">Average Household Income</label>
            <input type="text" name="average_household_income" id="" class="form-control" value="{{$report->average_household_income}}" >
        </div>
        <div class="form-group">
            <label for="" class="control-label">Median Age</label>
            <input type="text" name="median_age" id="" class="form-control" value="{{$report->median_age}}" >
        </div>
        <div class="form-group">
            <input type="submit" name="update" value="Update" class="btn btn-primary pull-right">
        </div>
    </form>

</div>

@endsection