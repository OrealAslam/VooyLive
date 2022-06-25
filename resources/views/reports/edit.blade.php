@extends('layouts.template')
@section('content')
<!-- Page Header -->
<div class="page-header style-11">
  <div class="container">
    <h2 class="page-title">{{__('reports/edit.manageAccount')}}</h2>
    <ol class="breadcrumb">
      <li><a href="{{ Route('home') }}">{{__('reports/edit.home')}}</a></li>
      <li><a href="{{ Route('dashboard') }}">{{__('reports/edit.dashboard')}}</a></li>
      <li class="active">{{__('reports/edit.editReport')}}</li>
    </ol>
  </div>
</div>

<div class="container">

    <form action="{{url('report/save')}}/{{$id}}" method="post" class="col-lg-offset-1 col-md-10">
        {{csrf_field()}}
        <div class="form-group">
          <h3 class="text-center">{{__('reports/edit.nameOfNeighbourhood')}}</h3>
          <label class="control-label">{{__('reports/edit.nameOfNeighbourhood')}}</label>
          <input type="text" name="neighbourhood_name" class="form-control" value="{{$report->neighbourhood_name}}" >
        </div>
        <div class="form-group">
          <h3 class="text-center">{{__('reports/edit.demographics')}}</h3>
          <label class="control-label">{{__('reports/edit.householdsWithChildren')}}</label>
          <input type="text" name="households_with_children" class="form-control" value="{{$report->households_with_children}}" >
        </div>
        <div class="form-group">
          <label class="control-label">{{__('reports/edit.averageHouseholdIncome')}}</label>
          <input type="text" name="average_household_income" class="form-control" value="{{$report->average_household_income}}" >
        </div>
        <div class="form-group">
          <label class="control-label">{{__('reports/edit.medianAge')}}</label>
          <input type="text" name="median_age" class="form-control" value="{{$report->median_age}}" >
        </div>
        <div class="form-group">
          <h3 class="text-center">{{__('reports/edit.schools')}}</h3>
          <h4 class="text-center">{{__('reports/edit.elementary')}}</h4>
          <label class="control-label">{{__('reports/edit.name')}}</label>
          <input type="text" name="el_name" class="form-control" value="{{$report->el_name}}" >
          <label class="control-label">{{__('reports/edit.address')}}</label>
          <input type="text" name="el_address" class="form-control" value="{{$report->el_address}}" >
          <div class="row">
            <div class="col-md-6">
              <label class="control-label">{{__('reports/edit.grade')}}</label>
              <input type="text" name="el_grade" class="form-control" value="{{$report->el_grade}}" >
            </div>             
            <div class="col-md-6">
              <label class="control-label">{{__('reports/edit.distance')}}</label>
              <input type="text" name="el_distance" class="form-control" value="{{$report->el_distance}}" >
            </div>   
          </div>
          <br>

          <h4 class="text-center">{{__('reports/edit.juniorHigh')}}</h4>
          <label class="control-label">{{__('reports/edit.name')}}</label>
          <input type="text" name="ju_name" class="form-control" value="{{$report->ju_name}}" >
          <label class="control-label">{{__('reports/edit.address')}}</label>
          <input type="text" name="ju_address" class="form-control" value="{{$report->ju_address}}" >
          <div class="row">
            <div class="col-md-6">
              <label class="control-label">{{__('reports/edit.grade')}}</label>
              <input type="text" name="ju_grade" class="form-control" value="{{$report->ju_grade}}" >
            </div>
            <div class="col-md-6">
              <label class="control-label">{{__('reports/edit.distance')}}</label>
              <input type="text" name="ju_distance" class="form-control" value="{{$report->ju_distance}}" >
            </div>
          </div>
          <br>
          <h4 class="text-center">{{__('reports/edit.seniorHigh')}}</h4>
          <label class="control-label">{{__('reports/edit.name')}}</label>
          <input type="text" name="se_name" class="form-control" value="{{$report->se_name}}" >
          <label class="control-label">{{__('reports/edit.address')}}</label>
          <input type="text" name="se_address" class="form-control" value="{{$report->se_address}}" >
          <div class="row">
            <div class="col-md-6">
              <label class="control-label">{{__('reports/edit.grade')}}</label>
              <input type="text" name="se_grade" class="form-control" value="{{$report->se_grade}}" >
            </div>
            <div class="col-md-6">
              <label class="control-label">{{__('reports/edit.distance')}}</label>
              <input type="text" name="se_distance" class="form-control" value="{{$report->se_distance}}" >
            </div>
          </div>
        </div>
        <div class="form-group">
          <h3 class="text-center">{{__('reports/edit.playgrounds')}}</h3>
          <div class="col-md-6">
            <h4 class="text-center">1</h4>
            <label class="control-label">{{__('reports/edit.name')}}</label>
            <input type="text" name="one_name" class="form-control" value="{{$report->one_name}}" >
            <label class="control-label">{{__('reports/edit.distance')}}</label>
            <input type="text" name="one_distance" class="form-control" value="{{$report->one_distance}}" >
          </div>
          <div class="col-md-6">
            <h4 class="text-center">2</h4>
            <label class="control-label">{{__('reports/edit.name')}}</label>
            <input type="text" name="two_name" class="form-control" value="{{$report->two_name}}" >
            <label class="control-label">{{__('reports/edit.distance')}}</label>
            <input type="text" name="two_distance" class="form-control" value="{{$report->two_distance}}" >
          </div>
        </div>
        <div class="margin-10"></div>
        <div class="form-group">
          <h3 class="text-center">{{__('reports/edit.recreation')}}</h3>
          <label class="control-label">{{__('reports/edit.name')}}</label>
          <input type="text" name="re_name" class="form-control" value="{{$report->re_name}}" >
          <label class="control-label">{{__('reports/edit.type')}}</label>
          <input type="text" name="re_type" class="form-control" value="{{$report->re_type}}" >
          <label class="control-label">{{__('reports/edit.distance')}}</label>
          <input type="text" name="re_distance" class="form-control" value="{{$report->re_distance}}" >
        </div>
        <div class="form-group">
          <h3 class="text-center">{{__('reports/edit.transport')}}</h3>
          <div class="col-md-6">
            <h4 class="text-center">{{__('reports/edit.busStop')}}</h4>
            <label class="control-label">{{__('reports/edit.name')}}</label>
            <input type="text" name="bus_name" class="form-control" value="{{$report->bus_name}}" >
            <label class="control-label">{{__('reports/edit.address')}}</label>
            <input type="text" name="bus_address" class="form-control" value="{{$report->bus_address}}" >
            <label class="control-label">{{__('reports/edit.distance')}}</label>
            <input type="text" name="bus_distance" class="form-control" value="{{$report->bus_distance}}" >
          </div>
          <div class="col-md-6">
            <h4 class="text-center">{{__('reports/edit.trainStation')}}</h4>
            <label class="control-label">{{__('reports/edit.name')}}name</label>
            <input type="text" name="train_name" class="form-control" value="{{$report->train_name}}" >
            <label class="control-label">{{__('reports/edit.address')}}</label>
            <input type="text" name="train_address" class="form-control" value="{{$report->train_address}}" >
            <label class="control-label">{{__('reports/edit.distance')}}</label>
            <input type="text" name="train_distance" class="form-control" value="{{$report->train_distance}}" >
          </div>
        </div>
        <div class="margin-10"></div>
        <div class="form-group">
          <h3 class="text-center">{{__('reports/edit.library')}}</h3>
          <h4 class="text-center">{{__('reports/edit.closestBranch')}}</h4>
          <label class="control-label">{{__('reports/edit.name')}}</label>
          <input type="text" name="lib_name" class="form-control" value="{{$report->lib_name}}" >
          <label class="control-label">{{__('reports/edit.address')}}</label>
          <input type="text" name="lib_address" class="form-control" value="{{$report->lib_address}}" >
          <label class="control-label">{{__('reports/edit.distance')}}</label>
          <input type="text" name="lib_distance" class="form-control" value="{{$report->lib_distance}}" >
        </div>
        <div class="form-group">
          <div class="text">
            <h3 class="text-center">{{__('reports/edit.conveniences')}}</h3>
            <h4 class="text-center">{{__('reports/edit.restaurants')}}</h4>
          </div>
          <div class="col-md-6">
            <h4 class="text-center">1</h4>
            <label class="control-label">{{__('reports/edit.name')}}</label>
            <input type="text" name="res_one_name" class="form-control" value="{{$report->res_one_name}}" >
            <label class="control-label">{{__('reports/edit.address')}}</label>
            <input type="text" name="res_one_address" class="form-control" value="{{$report->res_one_address}}" >
            <label class="control-label">{{__('reports/edit.distance')}}</label>
            <input type="text" name="res_one_distance" class="form-control" value="{{$report->res_one_distance}}" >
          </div>         
          <div class="col-md-6">
            <h4 class="text-center">2</h4>
            <label class="control-label">{{__('reports/edit.name')}}</label>
            <input type="text" name="res_two_name" class="form-control" value="{{$report->res_two_name}}" >
            <label class="control-label">{{__('reports/edit.address')}}</label>
            <input type="text" name="res_two_address" class="form-control" value="{{$report->res_two_address}}" >
            <label class="control-label">{{__('reports/edit.distance')}}</label>
            <input type="text" name="res_two_distance" class="form-control" value="{{$report->res_two_distance}}" >
          </div>
        </div>         
        <div class="row">
        <div class="col-md-12">
          <br>
          <h4 class="text-center">{{__('reports/edit.banks')}}</h4>
        </div>
          <div class="col-md-6">
            <h4 class="text-center">1</h4>
            <label class="control-label">{{__('reports/edit.name')}}</label>
            <input type="text" name="bank_one_name" class="form-control" value="{{$report->bank_one_name}}" >
            <label class="control-label">{{__('reports/edit.address')}}</label>
            <input type="text" name="bank_one_address" class="form-control" value="{{$report->bank_one_address}}" >
            <label class="control-label">{{__('reports/edit.distance')}}</label>
            <input type="text" name="bank_one_distance" class="form-control" value="{{$report->bank_one_distance}}" >
          </div>
          <div class="col-md-6">
            <h4 class="text-center">2</h4>
            <label class="control-label">{{__('reports/edit.name')}}</label>
            <input type="text" name="bank_two_name" class="form-control" value="{{$report->bank_two_name}}" >
            <label class="control-label">{{__('reports/edit.address')}}</label>
            <input type="text" name="bank_two_address" class="form-control" value="{{$report->bank_two_address}}" >
            <label class="control-label">{{__('reports/edit.distance')}}</label>
            <input type="text" name="bank_two_distance" class="form-control" value="{{$report->bank_two_distance}}" >
          </div>
        </div>
        <div class="row">
        <div class="col-md-12">
          <br>
          <h4 class="text-center">{{__('reports/edit.convenienceStores')}}</h4>
        </div>
          <div class="col-md-6">
            <h4 class="text-center">1</h4>
            <label class="control-label">{{__('reports/edit.name')}}</label>
            <input type="text" name="store_one_name" class="form-control" value="{{$report->store_one_name}}" >
            <label class="control-label">{{__('reports/edit.address')}}</label>
            <input type="text" name="store_one_address" class="form-control" value="{{$report->store_one_address}}" >
            <label class="control-label">{{__('reports/edit.distance')}}</label>
            <input type="text" name="store_one_distance" class="form-control" value="{{$report->store_one_distance}}" >
          </div>
          <div class="col-md-6">
            <h4 class="text-center">2</h4>
            <label class="control-label">{{__('reports/edit.name')}}</label>
            <input type="text" name="store_two_name" class="form-control" value="{{$report->store_two_name}}" >
            <label class="control-label">{{__('reports/edit.address')}}</label>
            <input type="text" name="store_two_address" class="form-control" value="{{$report->store_two_address}}" >
            <label class="control-label">{{__('reports/edit.distance')}}</label>
            <input type="text" name="store_two_distance" class="form-control" value="{{$report->store_two_distance}}" >
          </div>
        </div>
        <div class="row">
        <div class="col-md-12">
          <br>
          <h4 class="text-center">{{__('reports/edit.gasStation')}}</h4>
        </div>
          <div class="col-md-6">
            <h4 class="text-center">1</h4>
            <label class="control-label">{{__('reports/edit.name')}}</label>
            <input type="text" name="gas_one_name" class="form-control" value="{{$report->gas_one_name}}" >
            <label class="control-label">{{__('reports/edit.address')}}</label>
            <input type="text" name="gas_one_address" class="form-control" value="{{$report->gas_one_address}}" >
            <label class="control-label">{{__('reports/edit.distance')}}</label>
            <input type="text" name="gas_one_distance" class="form-control" value="{{$report->gas_one_distance}}" >
          </div>
          <div class="col-md-6">
            <h4 class="text-center">2</h4>
            <label class="control-label">{{__('reports/edit.name')}}</label>
            <input type="text" name="gas_two_name" class="form-control" value="{{$report->gas_two_name}}" >
            <label class="control-label">{{__('reports/edit.address')}}</label>
            <input type="text" name="gas_two_address" class="form-control" value="{{$report->gas_two_address}}" >
            <label class="control-label">{{__('reports/edit.distance')}}</label>
            <input type="text" name="gas_two_distance" class="form-control" value="{{$report->gas_two_distance}}" >
          </div>
        </div>
     
        <div class="row">
        <div class="col-md-12">
          <br>
          <h4 class="text-center">{{__('reports/edit.cafe')}}</h4>
        </div>
          <div class="col-md-6">
            <h4 class="text-center">1</h4>
            <label class="control-label">{{__('reports/edit.name')}}</label>
            <input type="text" name="cafe_one_name" class="form-control" value="{{$report->cafe_one_name}}" >
            <label class="control-label">{{__('reports/edit.address')}}</label>
            <input type="text" name="cafe_one_address" class="form-control" value="{{$report->cafe_one_address}}" >
            <label class="control-label">{{__('reports/edit.distance')}}</label>
            <input type="text" name="cafe_one_distance" class="form-control" value="{{$report->cafe_one_distance}}" >
          </div>
          <div class="col-md-6">
            <h4 class="text-center">2</h4>
            <label class="control-label">{{__('reports/edit.name')}}</label>
            <input type="text" name="cafe_two_name" class="form-control" value="{{$report->cafe_two_name}}" >
            <label class="control-label">{{__('reports/edit.address')}}</label>
            <input type="text" name="cafe_two_address" class="form-control" value="{{$report->cafe_two_address}}" >
            <label class="control-label">{{__('reports/edit.distance')}}</label>
            <input type="text" name="cafe_two_distance" class="form-control" value="{{$report->cafe_two_distance}}" >
          </div>
        </div>
        <div class="row">
        <div class="col-md-12">
          <br>
          <h4 class="text-center">{{__('reports/edit.gyms')}}</h4>
        </div>
          <div class="col-md-6">
            <h4 class="text-center">1</h4>
            <label class="control-label">{{__('reports/edit.name')}}</label>
            <input type="text" name="gym_one_name" class="form-control" value="{{$report->gym_one_name}}" >
            <label class="control-label">{{__('reports/edit.address')}}</label>
            <input type="text" name="gym_one_address" class="form-control" value="{{$report->gym_one_address}}" >
            <label class="control-label">{{__('reports/edit.distance')}}</label>
            <input type="text" name="gym_one_distance" class="form-control" value="{{$report->gym_one_distance}}" >
          </div>
          <div class="col-md-6">
            <h4 class="text-center">2</h4>
            <label class="control-label">{{__('reports/edit.name')}}</label>
            <input type="text" name="gym_two_name" class="form-control" value="{{$report->gym_two_name}}" >
            <label class="control-label">{{__('reports/edit.address')}}</label>
            <input type="text" name="gym_two_address" class="form-control" value="{{$report->gym_two_address}}" >
            <label class="control-label">{{__('reports/edit.distance')}}</label>
            <input type="text" name="gym_two_distance" class="form-control" value="{{$report->gym_two_distance}}" >
          </div>
          
        <div class="col-md-12 text-center"><br>
            <input type="reset" name="reset" value="{{__('reports/edit.reset')}}" class="btn btn-primary"><br>
        </div>
        <div class="col-md-12 text-center"><br>
            <input type="submit" name="update" value="{{__('reports/edit.update')}}" class="btn btn-primary"><br>
        </div>
        <br />
        </div>
        <br />
    </form>

</div>

@endsection