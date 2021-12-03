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
            <div class="col-md-6">
                <h2>Contact Us</h2>
            </div>
        </div>
        <div class="x_content">
            <p class="text-muted font-13 m-b-30">
            </p>
            <table class="table table-striped table-bordered table-hover" id="datatable01">
                <thead>
                    <tr>
                        <th width="5">Id</th>
                        <th>Name</th>
                        <th width="20%">Email</th>
                        <th width="13%">Phone No.</th>
                        <th width="30%">Message</th>
                        <th width="13%">Create Date</th>
                        <th width="30">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
      	</div>
    </div>
  </div>
</div>
@endsection

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
        order: [[6,'asc']],
        ajax: {
            url: "{!! route('contactUs') !!}",
            type: 'POST'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'name', name: 'name'},
            { data: 'email', name: 'email'},
            { data: 'phone', name: 'phone'},
            { data: 'message', name: 'message'},
            { data: 'created_at', name: 'created_at'},
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