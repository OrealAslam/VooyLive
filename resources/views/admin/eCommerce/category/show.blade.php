@extends('layouts.adminLayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="x_title">
            <div class="col-md-6">
                <h2>Category Show</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('categorys') }}" class="btn btn-success">Back Category</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <table class="table table-bordered bg-white">
        <tbody>
            <tr>
                <th width="150">Category Name</th>
                <td>{{ $data->title }}</td>
            </tr>
            <tr>
                <th>Category Type</th>
                <td>
                    @if($data->type == 0)
                        <span class="label label-primary" style="font-size:13px;">Product</span>
                    @else
                        <span class="label label-success" style="font-size:13px;">Credit</span>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>
@stop