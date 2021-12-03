@extends('layouts.adminLayout')
@section('pageLevelCSS')
    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    <style type="text/css">
        .dataTables_wrapper>.row{
            overflow:unset !important;
        }
    </style>
@endsection
@section('content')

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="row">
            <div class="x_title">
                <div class="col-md-6">
                    <h2>Purches Product Details</h2>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="x_content">
            <p class="text-muted font-13 m-b-30">
            </p>
            <table class="table table-bordered table-hover">
                <tr>
                    <td>User</td>
                    <td>
                        @if(!empty($productDetail->user['firstName']) && ($productDetail->user['lastName']))
                            {{ $productDetail->user['firstName'].' '.$productDetail->user['lastName'] }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Product Name</td>
                    <td>
                        @if(!empty($productDetail->product['name']))
                            {{ $productDetail->product['name'] }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Product Type</td>
                    <td>   
                        @if ($productDetail->product_type == 1)
                            <span class="label label-primary">Product</span>
                        @else
                            <span class="label label-success">Credit</span>
                        @endif
                    </td>

                </tr>
                <tr>
                    <td>Amount</td>
                    <td>
                        @if(!empty($productDetail->amount))
                            ${{ $productDetail->amount }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>
                        @if(!empty($productDetail->address))
                        {{ $productDetail->address }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Neighborhood</td>
                    <td>
                        @if(!empty($productDetail->neighborhood))
                        {{ $productDetail->neighborhood }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Extra Option</td>
                    <td>
                        @if(!empty($productDetail->extra_option))
                        {{ $productDetail->extra_option }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Custom Design File Upload</td>
                    <td>
                        @if(!empty($productDetail->custom_design_file_upload))
                            <a href="{{ asset('/upload/cartFile/'.$productDetail->custom_design_file_upload) }}" download>{{ $productDetail->custom_design_file_upload }}</a>\
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Creation Date</td>
                    <td>
                        @if(!empty($productDetail->created_at))
                        {{ \Carbon\Carbon::parse($productDetail->created_at)->format('Y-m-d') }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
            </table>
      </div>
    </div>
  </div>

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="row">
            <div class="x_title">
                <div class="col-md-6">
                    <h2>Product Details List</h2>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('user.product.detail.create',$id) }}" class="btn btn-success">Add Product Details</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="x_content">
            <p class="text-muted font-13 m-b-30">
            </p>
            <table class="table table-striped table-bordered table-hover data-table">
                <thead>
                    <tr>
                        <th width="5">Id</th>
                        <th>Note</th>
                        <th width="30">File</th>
                        <th width="90" class="text-center">Action</th>
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
<script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
<script>
   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function () {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
             ajax: {
                url: "{{ route('user.product.detail.index',$id) }}",
                type: 'GET'
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'note', name: ' note'},
                {data: 'file', name: 'file'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $.fn.dataTable.ext.errMode = 'throw';
    });
</script>
@endsection