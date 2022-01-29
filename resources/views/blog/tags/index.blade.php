@extends('layouts.adminLayout')
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="row">
            <div class="x_title">
                <div class="col-md-6">
                    <h2>Blog Tag List</h2>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('tag.create') }}" class="btn btn-success">Add Blog Tag</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="x_content">
            <p class="text-muted font-13 m-b-30">
            </p>
            <table class="table table-striped table-bordered table-hover" id="">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th class="text-right" width="120">Action</th>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td class="text-right">
                            <a href="{{ route('tag.edit',$tag->id) }}" class="btn btn-primary"><li class="fa fa-edit"></li></a>
                            <a href="{{ route('tag.delete',$tag->id) }}" class="btn btn-danger"><li class="fa fa-remove"></li></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
    </div>
  </div>
</div>
@stop