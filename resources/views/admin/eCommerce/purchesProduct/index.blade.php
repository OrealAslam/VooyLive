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
                    <h2>Purches Product List</h2>
                </div>
                <div class="col-md-6 text-right">
                    <!-- <a href="{{ route('product.create') }}" class="btn btn-success">Add New Product</a> -->
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
                        <th>User</th>
                        <th>Product Name</th>
                        <th>Product Type</th>
                        <th>Amount</th>
                        <th>Address</th>
                        <th>Neighborhood</th>
                        <th>Creation Date</th>
                        <th>Action</th>
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
            ajax: {
                url: "{!! route('purches.products') !!}",
                type: 'POST'
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'userName', name: 'userName'},
                { data: 'product', name: 'product'},
                { data: 'type', name: 'type'},
                { data: 'amount', name: 'amount'},
                { data: 'address', name: 'address'},
                { data: 'neighborhood', name: 'neighborhood'},
                { data: 'created_at', name: 'created_at'},
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            initComplete: function () {
            }
         });

        $("body").on("click",".delete-pro",function(){
            var product_id = $(this).data('id');
            swal({
                title: "Are you sure you want to delete this Record?",
                type: "error",
                showCancelButton: true,
                cancelButtonClass: 'btn-default btn-md waves-effect',
                confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
                confirmButtonText: 'Delete!'
            },function (result) {
                  if (result) {
                      $.ajax({
                          type: "POST",
                          dataType: "json",
                          url: "{{ route('purches.products.delete') }}",
                          data: {'_token': token, product_id: product_id},
                          success: function(data){
                              var url = "{{ route('purches.products') }}";
                              window.location.href = url;
                          }
                        });
                    }
            });
           

        });
    });
</script>
@endsection
