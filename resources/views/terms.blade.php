@extends('layouts.app')
@section('content')
<div class="card" style="width: 20rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-block">
    <h4 class="card-title">{{__('terms.cardTitle')}}</h4>
    <p class="card-text">{{__('terms.someQuickExample')}}</p>
    <a href="#" class="btn btn-primary">{{__('terms.goSomewhere')}}</a>
  </div>
</div>
@endsection