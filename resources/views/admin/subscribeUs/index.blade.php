@extends('layouts.adminLayout')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="row">
                <div class="col-md-6">
                    <h2>Subscribe Us</h2>
                </div>
        </div>
        <div class="x_content">
            <table class="table table-striped table-bordered table-hover datatable">
                <thead>
                    <tr>
                        <th width="5">Id</th>
                        <th>Email</th>
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
<link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{!! route('subscribe.us.list') !!}",
            type: 'GET'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'email', name: 'email'},
        ]
     });
});
</script>
@endsection