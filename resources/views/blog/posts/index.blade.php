@extends('layouts.adminLayout')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="row">
                <div class="x_title">
                    <div class="col-md-6">
                        <h2>Blog Posts List</h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('post.create') }}" class="btn btn-success">Add Blog Post</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="x_content">
                <table class="table table-striped table-bordered table-hover" id="">
                    <thead>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Tags</th>
                        <th width="50">Status</th>
                        <th class="text-right" width="120">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td><img src="{{ asset('upload/blog/'.$post->image.'') }}" height="100" width="150"></td>
                            <td>{{ $post->title }}</td>
                            <td>{!! $post->description !!}</td>
                            <td>
                                @foreach ($post->tags as $tag)
                                    <span class="label label-default">{{ $tag->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ $post->status }}</td>
                            <td class="text-right">
                                <a href="{{ route('post.edit',$post->id) }}" class="btn btn-primary"><li class="fa fa-edit"></li></a>
                                <a href="{{ route('post.delete',$post->id) }}" class="btn btn-danger"><li class="fa fa-remove"></li></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                {!! $posts->links(); !!}
            </div>
        </div>
    </div>
</div>

@stop