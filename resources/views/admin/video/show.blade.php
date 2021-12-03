@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row" style="margin-top:20px;">
        <div class="col-md-12">
            <div class="row">
                <div class="x_title">
                    <div class="col-md-6">
                        <h2>Video Show</h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('video') }}" class="btn btn-success">Back</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table class="table table-striped table-bordered table-hover" id="datatable01">
                        <thead>
                            <tr>
                                <th width="35">Id</th>
                                <th>Video</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $video->id }}</td>
                                <td>
                                    <div class="video-box">
                                       <iframe src="{{ $video->link }}" width="100%" height="500" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
              </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('pageLevelJS')
    
@stop