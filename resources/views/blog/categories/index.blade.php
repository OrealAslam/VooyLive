@extends('layouts.adminLayout')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="row">
                <div class="x_title">
                    <div class="col-md-6">
                        <h2>Blog Category List</h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('blog.category.create') }}" class="btn btn-success">Add Blog Category</a>
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
                        <th width="50">Status</th>
                        <th class="text-right" width="120">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->status }}</td>
                            <td class="text-right">
                                <a href="{{ route('blog.category.edit',$category->id) }}" class="btn btn-primary"><li class="fa fa-edit"></li></a>
                                <a href="{{ route('blog.category.delete',$category->id) }}" class="btn btn-danger"><li class="fa fa-remove"></li></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                {!! $categories->links(); !!}
            </div>
        </div>
    </div>
</div>
@stop