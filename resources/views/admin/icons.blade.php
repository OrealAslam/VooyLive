@extends('layouts.adminLayout')

@section('content')

<style>
.icon-container {
    width: 32px;
    height: 32px;
}

.icon-container svg {
    width: 32px;
    height: 32px;
}
</style>

<h1>Icons</h1>
<a href="{{route('upsertHdiIcons')}}" class="pull-right btn btn-success" style="margin-right: 5%">Add New Icon</a>


<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Icon Name</th>
            <th>Icon</th>
            <th>User Name</th>
            <th>Tags</th>
            <th>Dated Created</th>
            <th>Dated Modified</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($icons as $icon)
        <tr>
            <td>{{ $icon->id }}</td>
            <td>{{ $icon->name }}</td>
            <td>
                <div class="icon-container" style="">
                    <img src="{{env('AWS_URL').'hdi_icons/'.$icon->icon_file}}" class="img-responsive" />
                </div>
            </td>
            <td>{{ (isset($icon->User->firstName)) ? $icon->User->firstName .' '. $icon->User->lastName : 'N/A' }}</td>
            <td>
                @foreach ($icon->IconTags as $iconTag)
                <a href="{{URL::Route('upsertHdiIconTags', ['id' => $iconTag->Tag->id])}}"
                    class="btn btn-info btn-xs">{{$iconTag->Tag->name}}</a>
                @endforeach
            </td>
            <td>{{ $icon->created_at }}</td>
            <td>{{ $icon->created_at }}</td>
            <td><a href="{{URL::Route('upsertHdiIcons', ['id' => $icon->id])}}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>

</table>
<nav>
    {{ $icons->links() }}
</nav>

@stop