<!DOCTYPE html>
<html>
<head>
	<title>{{__('pdfView.userListPDF')}}</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<a href="{{ route('generate-pdf',['download'=>'pdf']) }}">{{__('pdfView.downloadPDF')}}</a>
	<table class="table table-bordered">
		<thead>
			<th>{{__('pdfView.name')}}</th>
			<th>{{__('pdfView.email')}}</th>
		</thead>
		<tbody>
			@foreach ($users as $key => $value)
			<tr>
				<td>{{ $value->firstName }}</td>
				<td>{{ $value->email }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
</body>
</html>