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
          <h3 class="text-center">Demographics</h3>
          <label class="control-label">Households With Children</label>
          <input type="text" name="households_with_children" class="form-control" value="{{$report->households_with_children}}" autocomplete="off">
        </div>
        <div class="form-group">
          <label class="control-label">Average Household Income</label>
          <input type="text" name="average_household_income" class="form-control" value="{{$report->average_household_income}}" >
        </div>
        <div class="form-group">
          <label class="control-label">Median Age</label>
          <input type="text" name="median_age" class="form-control" value="{{$report->median_age}}" >
        </div>
        <div class="form-group">
          <h3 class="text-center">Schools</h3>
          <h4 class="text-center">Elementary</h4>
          <label class="control-label">Name</label>
          <input type="text" name="el_name" class="form-control" value="{{$report->el_name}}" >
          <label class="control-label">Address</label>
          <input type="text" name="el_address" class="form-control" value="{{$report->el_address}}" >
          <label class="control-label">Grade</label>
          <input type="text" name="el_grade" class="form-control" value="{{$report->el_grade}}" >
          <label class="control-label">Distance</label>
          <input type="text" name="el_distance" class="form-control" value="{{$report->el_distance}}" ><br>
          <h4 class="text-center">Junior High</h4>
          <label class="control-label">Name</label>
          <input type="text" name="ju_name" class="form-control" value="{{$report->ju_name}}" >
          <label class="control-label">Address</label>
          <input type="text" name="ju_address" class="form-control" value="{{$report->ju_address}}" >
          <label class="control-label">Grade</label>
          <input type="text" name="ju_grade" class="form-control" value="{{$report->ju_grade}}" >
          <label class="control-label">Distance</label>
          <input type="text" name="ju_distance" class="form-control" value="{{$report->ju_distance}}" ><br>
          <h4 class="text-center">Senior High</h4>
          <label class="control-label">Name</label>
          <input type="text" name="se_name" class="form-control" value="{{$report->se_name}}" >
          <label class="control-label">Address</label>
          <input type="text" name="se_address" class="form-control" value="{{$report->se_address}}" >
          <label class="control-label">Grade</label>
          <input type="text" name="se_grade" class="form-control" value="{{$report->se_grade}}" >
          <label class="control-label">Distance</label>
          <input type="text" name="se_distance" class="form-control" value="{{$report->se_distance}}" >
        </div>
        <div class="form-group">
          <h3 class="text-center">Playgrounds</h3>
          <h4 class="text-center">1</h4>
          <label class="control-label">Name</label>
          <input type="text" name="one_name" class="form-control" value="{{$report->one_name}}" >
          <label class="control-label">Distance</label>
          <input type="text" name="one_distance" class="form-control" value="{{$report->one_distance}}" ><br>
          <h4 class="text-center">2</h4>
          <label class="control-label">Name</label>
          <input type="text" name="two_name" class="form-control" value="{{$report->two_name}}" >
          <label class="control-label">Distance</label>
          <input type="text" name="two_distance" class="form-control" value="{{$report->two_distance}}" >
        </div>
        <div class="form-group">
          <h3 class="text-center">Recreation</h3>
          <label class="control-label">Name</label>
          <input type="text" name="re_name" class="form-control" value="{{$report->re_name}}" >
          <label class="control-label">Type</label>
          <input type="text" name="re_type" class="form-control" value="{{$report->re_type}}" >
          <label class="control-label">Distance</label>
          <input type="text" name="re_distance" class="form-control" value="{{$report->re_distance}}" >
        </div>
        <div class="form-group">
          <h3 class="text-center">Transport</h3>
          <h4 class="text-center">Bus Stop</h4>
          <label class="control-label">Name</label>
          <input type="text" name="bus_name" class="form-control" value="{{$report->bus_name}}" >
          <label class="control-label">Address</label>
          <input type="text" name="bus_address" class="form-control" value="{{$report->bus_address}}" >
          <label class="control-label">Distance</label>
          <input type="text" name="bus_distance" class="form-control" value="{{$report->bus_distance}}" ><br>
          <h4 class="text-center">Train Station</h4>
          <label class="control-label">Name</label>
          <input type="text" name="train_name" class="form-control" value="{{$report->train_name}}" >
          <label class="control-label">Address</label>
          <input type="text" name="train_address" class="form-control" value="{{$report->train_address}}" >
          <label class="control-label">Distance</label>
          <input type="text" name="train_distance" class="form-control" value="{{$report->train_distance}}" >
        </div>
        <div class="form-group">
          <h3 class="text-center">Library</h3>
          <h4 class="text-center">Closest Branch</h4>
          <label class="control-label">Name</label>
          <input type="text" name="lib_name" class="form-control" value="{{$report->lib_name}}" >
          <label class="control-label">Address</label>
          <input type="text" name="lib_address" class="form-control" value="{{$report->lib_address}}" >
          <label class="control-label">Distance</label>
          <input type="text" name="lib_distance" class="form-control" value="{{$report->lib_distance}}" >
        </div>
        <div class="form-group">
          <h3 class="text-center">Conveniences</h3>
          <h4 class="text-center">Restaurants</h4>
          <h4 class="text-center">1</h4>
          <label class="control-label">Name</label>
          <input type="text" name="res_one_name" class="form-control" value="{{$report->res_one_name}}" >
          <label class="control-label">Address</label>
          <input type="text" name="res_one_address" class="form-control" value="{{$report->res_one_address}}" >
          <label class="control-label">Distance</label>
          <input type="text" name="res_one_distance" class="form-control" value="{{$report->res_one_distance}}" ><br>
          <h4 class="text-center">2</h4>
          <label class="control-label">Name</label>
          <input type="text" name="res_two_name" class="form-control" value="{{$report->res_two_name}}" >
          <label class="control-label">Address</label>
          <input type="text" name="res_two_address" class="form-control" value="{{$report->res_two_address}}" >
          <label class="control-label">Distance</label>
          <input type="text" name="res_two_distance" class="form-control" value="{{$report->res_two_distance}}" ><br>
          <h4 class="text-center">Banks</h4>
          <h4 class="text-center">1</h4>
          <label class="control-label">Name</label>
          <input type="text" name="bank_one_name" class="form-control" value="{{$report->bank_one_name}}" >
          <label class="control-label">Address</label>
          <input type="text" name="bank_one_address" class="form-control" value="{{$report->bank_one_address}}" >
          <label class="control-label">Distance</label>
          <input type="text" name="bank_one_distance" class="form-control" value="{{$report->bank_one_distance}}" ><br>
          <h4 class="text-center">2</h4>
          <label class="control-label">Name</label>
          <input type="text" name="bank_two_name" class="form-control" value="{{$report->bank_two_name}}" >
          <label class="control-label">Address</label>
          <input type="text" name="bank_two_address" class="form-control" value="{{$report->bank_two_address}}" >
          <label class="control-label">Distance</label>
          <input type="text" name="bank_two_distance" class="form-control" value="{{$report->bank_two_distance}}" ><br>
          <h4 class="text-center">Convenience Stores</h4>
          <h4 class="text-center">1</h4>
          <label class="control-label">Name</label>
          <input type="text" name="store_one_name" class="form-control" value="{{$report->store_one_name}}" >
          <label class="control-label">Address</label>
          <input type="text" name="store_one_address" class="form-control" value="{{$report->store_one_address}}" >
          <label class="control-label">Distance</label>
          <input type="text" name="store_one_distance" class="form-control" value="{{$report->store_one_distance}}" ><br>
          <h4 class="text-center">2</h4>
          <label class="control-label">Name</label>
          <input type="text" name="store_two_name" class="form-control" value="{{$report->store_two_name}}" >
          <label class="control-label">Address</label>
          <input type="text" name="store_two_address" class="form-control" value="{{$report->store_two_address}}" >
          <label class="control-label">Distance</label>
          <input type="text" name="store_two_distance" class="form-control" value="{{$report->store_two_distance}}" ><br>
          <h4 class="text-center">Gas Station</h4>
          <h4 class="text-center">1</h4>
          <label class="control-label">Name</label>
          <input type="text" name="gas_one_name" class="form-control" value="{{$report->gas_one_name}}" >
          <label class="control-label">Address</label>
          <input type="text" name="gas_one_address" class="form-control" value="{{$report->gas_one_address}}" >
          <label class="control-label">Distance</label>
          <input type="text" name="gas_one_distance" class="form-control" value="{{$report->gas_one_distance}}" ><br>
          <h4 class="text-center">2</h4>
          <label class="control-label">Name</label>
          <input type="text" name="gas_two_name" class="form-control" value="{{$report->gas_two_name}}" >
          <label class="control-label">Address</label>
          <input type="text" name="gas_two_address" class="form-control" value="{{$report->gas_two_address}}" >
          <label class="control-label">Distance</label>
          <input type="text" name="gas_two_distance" class="form-control" value="{{$report->gas_two_distance}}" ><br>
          <h4 class="text-center">Cafe</h4>
          <h4 class="text-center">1</h4>
          <label class="control-label">Name</label>
          <input type="text" name="cafe_one_name" class="form-control" value="{{$report->cafe_one_name}}" >
          <label class="control-label">Address</label>
          <input type="text" name="cafe_one_address" class="form-control" value="{{$report->cafe_one_address}}" >
          <label class="control-label">Distance</label>
          <input type="text" name="cafe_one_distance" class="form-control" value="{{$report->cafe_one_distance}}" ><br>
          <h4 class="text-center">2</h4>
          <label class="control-label">Name</label>
          <input type="text" name="cafe_two_name" class="form-control" value="{{$report->cafe_two_name}}" >
          <label class="control-label">Address</label>
          <input type="text" name="cafe_two_address" class="form-control" value="{{$report->cafe_two_address}}" >
          <label class="control-label">Distance</label>
          <input type="text" name="cafe_two_distance" class="form-control" value="{{$report->cafe_two_distance}}" ><br>
          <h4 class="text-center">Gyms</h4>
          <h4 class="text-center">1</h4>
          <label class="control-label">Name</label>
          <input type="text" name="gym_one_name" class="form-control" value="{{$report->gym_one_name}}" >
          <label class="control-label">Address</label>
          <input type="text" name="gym_one_address" class="form-control" value="{{$report->gym_one_address}}" >
          <label class="control-label">Distance</label>
          <input type="text" name="gym_one_distance" class="form-control" value="{{$report->gym_one_distance}}" ><br>
          <h4 class="text-center">2</h4>
          <label class="control-label">Name</label>
          <input type="text" name="gym_two_name" class="form-control" value="{{$report->gym_two_name}}" >
          <label class="control-label">Address</label>
          <input type="text" name="gym_two_address" class="form-control" value="{{$report->gym_two_address}}" >
          <label class="control-label">Distance</label>
          <input type="text" name="gym_two_distance" class="form-control" value="{{$report->gym_two_distance}}" ><br>
        </div>
        <div class="form-group text-center">
            <input type="submit" name="update" value="Update" class="btn btn-primary"><br>
        </div>
    </form>

</div>

@endsection