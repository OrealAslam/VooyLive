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
                    <h2>Product List</h2>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('product.create') }}" class="btn btn-success">Add New Product</a>
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
                        <th>Id</th>
                        <th width="80">Image</th>
                        <th>Name</th>
                        <th width="80">Price</th>
                        <th width="100">Product Code</th>
                        <th>Description</th>
                        <th>Is Home Page</th>
                        <th width="120">Action</th>
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
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#datatable01').DataTable({
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},
                {extend: 'print',
                    customize: function (win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                    }
                }
            ],
            processing: true,
            serverSide: true,
            order: [[7,'asc']],
            ajax: {
                url: "{!! route('products') !!}",
                type: 'POST'
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', width:"13px"},
                { data: 'image', name: 'image' },
                { data: 'name', name: 'name' },
                { data: 'price', name: 'price' },
                { data: 'product_code', name: 'product_code' },
                { data: 'description', name: 'description' },
                { data: 'is_home_page', name: 'is_home_page' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            //autoWidth: false,
            initComplete: function () {
                //for column search
                /*
                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement("input");
                    $(input).appendTo($(column.footer()).empty())
                    .on('change', function () {
                        column.search($(this).val(), false, false, true).draw();
                    });
                });
                */
            }
         });
    });
</script>
@endsection