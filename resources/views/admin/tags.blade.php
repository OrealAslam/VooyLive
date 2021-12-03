@extends('layouts.adminLayout')

@section('content')

<style>
.icon-container {
	width:32px;
	height: 32px;
}
.icon-container svg{
	width:32px;
	height: 32px;
}
</style>

 	<h1>Icons</h1>
 	<a href="{{route('upsertHdiIconTags')}}" class="pull-right btn btn-success" style="margin-right: 5%">Add New Tag</a>


	<table class="table table-striped">
		<thead>
			<tr>
				<th>Id</th>
				<th>Tag Name</th>
				<th>Dated Created</th>
				<th>Dated Modified</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tags as $tag)
			<tr>
				<td>{{ $tag->id }}</td>
				<td>{{ $tag->name }}</td>
				<td>{{ $tag->created_at }}</td>
				<td>{{ $tag->created_at }}</td>
				<td><a href="{{URL::Route('upsertHdiIconTags', ['id' => $tag->id])}}">Edit</a></td>
			</tr>
			@endforeach
		</tbody>
		
	</table>
	<nav>
		{{ $tags->links() }}
	</nav>

@stop