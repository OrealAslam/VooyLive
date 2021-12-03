@extends('layouts.adminLayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="x_title">
            <div class="col-md-6">
                <h2>Product Show</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('products') }}" class="btn btn-success">Back Product</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <table class="table table-bordered bg-white">
        <tbody>
            <tr>
                <th width="150">Category Name</th>
                <td>{{ $data->categoryName->title }}</td>
            </tr>
            <tr>
                <th width="150">Product Name</th>
                <td>{{ $data->name }}</td>
            </tr>
            <tr>
                <th width="150">Product Price</th>
                <td>{{ $data->price }}</td>
            </tr>
             <tr>
                <th width="150">Product Actual Price</th>
                <td>{{ $data->actual_price }}</td>
            </tr>
            <tr>
                <th width="150">Product Code</th>
                <td>{{ $data->product_code }}</td>
            </tr>
            <tr>
                <th width="150">Product Description</th>
                <td>{!! $data->description !!}</td>
            </tr>
            <tr>
                <th width="150">Product Image</th>
                <td><img src="{{ asset('upload/product/'.$data->image) }}" height="100" width="100"></td>
            </tr>
        </tbody>
    </table>
</div>
@stop