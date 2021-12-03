@extends('layouts.adminLayout')
@section('pageLevelCSS')
    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<style>
    div.html5buttons {
        float: right;
    }
    div.dataTables_filter {
        width: auto;
    }
    div.dataTables_filter label {
        margin-right: 5px;
    }
    div.html5buttons a.btn {
        padding-top: 4px;
        padding-bottom: 4px;
    }
</style>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="row">
            <div class="x_title">
                <div class="col-md-6">
                    <h2>Product Document List</h2>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('product.document.create') }}" class="btn btn-success">Add New</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="x_content">
            <p class="text-muted font-13 m-b-30">
            </p>
            <table class="table table-striped table-bordered table-hover" id="datatable01">
                <thead>
                    <tr>
                        <th width="20">#</th>
                        <th width="500">Document</th>
                        <th>Title</th>
                        <th width="80">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
      </div>
    </div>
  </div>
</div>
@stop
    
@section('pageLevelJS')
<!-- page Level JS -->
<script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
<script type="text/javascript">
  $(function () {

    var table = $('#datatable01').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('product.document.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'link', name: 'link'},
            {data: 'title', name: 'title'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });

    $.fn.dataTable.ext.errMode = 'throw';

  });
</script>
@endsection