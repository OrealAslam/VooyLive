@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="x_title">
            <div class="col-md-6">
                <h2>Show Ecard Photo</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('ecard.photo') }}" class="btn btn-success">Back</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="x_panel">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <th width="170">Ecard Category Name</th>
                        <td>{{ $ecardPhoto->EcardCategoryName->name }}</td>
                    </tr>
                    <tr>
                        <th width="170">Title</th>
                        <td>{{ $ecardPhoto->title }}</td>
                    </tr>
                    <tr>
                        <th width="170">X Greeting Coordinate</th>
                        <td>{{ $ecardPhoto->x_greeting_coordinate }}</td>
                    </tr>
                    <tr>
                        <th width="170">Y Greeting Coordinate</th>
                        <td>{{ $ecardPhoto->y_greeting_coordinate }}</td>
                    </tr>
                    <tr>
                        <th width="170">X Solution Coordinate</th>
                        <td>{{ $ecardPhoto->x_solution_coordinate }}</td>
                    </tr>
                    <tr>
                        <th width="170">Y Solution Coordinate</th>
                        <td>{{ $ecardPhoto->y_solution_coordinate }}</td>
                    </tr>
                    <tr>
                        <th width="170">X Message Coordinate</th>
                        <td>{{ $ecardPhoto->x_message_coordinate }}</td>
                    </tr>
                    <tr>
                        <th width="170">Y Message Coordinate</th>
                        <td>{{ $ecardPhoto->y_message_coordinate }}</td>
                    </tr>
                    <tr>
                        <th width="170">X Signature Coordinate</th>
                        <td>{{ $ecardPhoto->x_signature_coordinate }}</td>
                    </tr>
                    <tr>
                        <th width="170">Y Signature Coordinate</th>
                        <td>{{ $ecardPhoto->y_signature_coordinate }}</td>
                    </tr>
                    <tr>
                        <th width="170">Sample Image</th>
                        <td><img src="{{ asset('/upload/ecard/sample/'.$ecardPhoto->sample_image) }}" style="height:300px;width:300px;"></td>
                    </tr>
                    <tr>
                        <th width="170">Blank Image</th>
                        <td><img src="{{ asset('/upload/ecard/blank/'.$ecardPhoto->blank_image) }}" style="height:300px;width:300px;"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

