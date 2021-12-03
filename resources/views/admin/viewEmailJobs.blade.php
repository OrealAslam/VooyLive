@extends('layouts.adminLayout')

@section('content')
    @if(Session::has('status'))
        <div class="alert alert-danger">{{Session::pull('status')}}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <th>Id</th>
            <th>Queue</th>
            <th>Payload</th>
            <th>Attempts</th>
            <th>Reserved At</th>
            <th>Available At</th>
            <th>Created At</th>
        </thead>
        <tbody>
            @foreach($records as $record)
            <tr>
                <td>{{ $record->id }}</td>
                <td>{{ $record->queue }}</td>
                <td>{{ $record->payload }}</td>
                <td>{{ $record->attempts }}</td>
                <td>
                    @if(!empty($record->reserved_at))
                    {{ \Carbon\Carbon::createFromTimestamp($record->reserved_at) }}
                    @endif
                </td>
                <td>
                    @if(!empty($record->available_at))
                    {{ \Carbon\Carbon::createFromTimestamp($record->available_at) }}
                    @endif
                </td>
                <td>
                    @if(!empty($record->created_at))
                    {{ \Carbon\Carbon::createFromTimestamp($record->created_at) }}
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