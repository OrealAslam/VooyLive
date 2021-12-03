@extends('layouts.adminLayout')

@section('pageLevelCSS')
<!-- page Level CSS -->
    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-toggle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tostr.css') }}" rel="stylesheet">
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
      <div class="x_title">
        <h2>Customers List</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
            <p class="text-muted font-13 m-b-30">
            </p>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="datatable01">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Region</th>
                            <th>Created</th>
                            <th>Plan</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Activate</th>
                            <th>Renew At</th>
                            <th>Expired</th>
                            <th>Is Allow Multiple Surey</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Region</th>
                            <th>Created</th>
                            <th>Plan</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Activate</th>
                            <th>Renew At</th>
                            <th>Expired</th>
                            <th>Is Allow Multiple Surey</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
      </div>
    </div>
  </div>
</div>
@stop
    
@section('pageLevelJS')
<!-- page Level JS -->
<script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('js/tostr.js') }}"></script>

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
                url: "{!! route('customers') !!}",
                type: 'POST'
            },
            columns: [
                { data: 'userId', name: 'userId', width:"13px"},
                { data: 'firstName', name: 'firstName' },
                { data: 'lastName', name: 'lastName' },
                { data: 'email', name: 'email' },
                { data: 'role', name: 'role' },
                { data: 'region', name: 'region', orderable: false, searchable: false },
                { data: 'created', name: 'created' , orderable: false, searchable: false},
                { data: 'plan', name: 'plan' , searchable: false},
                { data: 'status', name: 'status' , orderable: false, searchable: false},
                { data: 'type', name: 'type', orderable: false, searchable: false },
                { data: 'activate', name: 'activate', orderable: false, searchable: false },
                { data: 'renew_at', name: 'renew_at', orderable: false, searchable: false },
                { data: 'expired', name: 'expired', orderable: false, searchable: false },
                { data: 'statusSurvey', name: 'statusSurvey', orderable: false, searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ],
         });
    });
    $('body').on('change','.change-status',function () {
        var status = $(this).prop('checked') == true ? '1' : '0';
        var id = $(this).data('id');
        var url = 'user/change-status/'+id;
            $.ajax({
                url: url,
                method: "POST",
                data: {_token:token,status:status},
                success: function(data){
                    toastr.success('Allow Multiple Survey Update Successfully.');
                }
            });
        });
</script>
@endsection



