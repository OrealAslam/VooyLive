@extends('layouts.adminLayout')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="row">
            <div class="x_title">
                <div class="col-md-6">
                    <h2>Faq Question Answer ({{ $faqQuestionTitle->title }})</h2>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('faq-question-answer.create',['id' => $id]) }}" class="btn btn-success">Create Faq Question Answer</a>
                    <a href="{{ route('faq-question-title.index') }}" class="btn btn-primary">Back</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="x_content">
            <table class="table table-striped table-bordered table-hover datatable">
                <thead>
                    <tr>
                        <th width="5">Id</th>
                        <th>Question</th>
                        <th width="450">Description</th>
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
            url: "{!! route('faq-question-answer.index',['titleId'=>$id]) !!}",
            type: 'GET'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'question', name: 'question'},
            { data: 'description', name: 'description'},
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
     });
});
</script>
@endsection