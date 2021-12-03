@extends('layouts.adminLayout')

@section('content')
    @if(Session::has('status'))
        <div class="alert alert-danger">{{Session::pull('status')}}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <th>Id</th>
            <th>Connection</th>
            <th>Queue</th>
            <th>Payload</th>
            <th>Exception</th>
            <th>Failed At</th>
        </thead>
        <tbody>
            @foreach($records as $record)
            <tr>
                <td>{{ $record->id }}</td>
                <td>{{ $record->connection }}</td>
                <td>{{ $record->queue }}</td>
                <td>{{ $record->payload }}</td>
                <td>{{ $record->exception }}</td>
                <td>
                    @if(!empty($record->failed_at))
                    {{ $record->failed_at }}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <div class="pull-left">
            Total Records = {{ $total_records }}
        </div>
        <div class="pull-right">
            {{ $records->links() }}
        </div>
    </div>

@stop