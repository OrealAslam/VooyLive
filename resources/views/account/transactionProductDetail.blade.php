@extends('layouts.template')

@section('customStyle')
<style type="text/css">
.download-btn {
    border-radius: 3px;
    padding: 0px 8px;
    margin-bottom: 5px;
    line-height: 25px;
    font-size: 12px;
}

.download-btn i {
    padding: 2px 4px;
    border-radius: 3px;
    background: #fff;
    color: #EA2349;
    margin-left: 8px;
}
</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">Product Detail</h2>
        <ol class="breadcrumb">
            <li><a href="{{ Route('home') }}">Home</a></li>
            <li><a href="{{ Route('dashboard') }}">Dashboard</a></li>
            <li class="active">Product Detail</li>
        </ol>
    </div>
</div>

<div class="cps-main-wrap">
    <!-- Custom Features -->
    <div class="cps-section cps-section-padding" id="features">
        <div class="container">
            <div class="col-md-12">
                <h3>Product Detail</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Product Name</th>
                            <th>Amount</th>
                            <th>Address</th>
                            <th>Neighbourhood</th>
                            <th>Extra Option</th>
                            <th>Custom Design File Upload</th>
                            <th>Purchase Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{ $product->product->name ?? '-' }}</td>
                            <td>${{ $product->amount  ?? '-' }}</td>
                            <td>{{ $product->address ?? '-' }}</td>
                            <td>{{ $product->neighborhood ?? '-' }}</td>
                            <td>{{ $product->extra_option ?? '-' }}</td>
                            <td><a href="{{ env('AWS_URL').'upload/cartFile/'.$product->custom_design_file_upload }}"
                                    download>{{ $product->custom_design_file_upload }}</a></td>
                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $product->created_at)->format('m/d/Y') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th width="75%">Reply</th>
                            <th>Download</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!is_null($product->userProductDetail))
                        @foreach($product->userProductDetail as $key => $productdetail)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{!! $productdetail->note !!}</td>
                            <td>
                                @if(!empty($productdetail->file))
                                @foreach(json_decode($productdetail->file) as $value)
                                <a href="{{ route('doc.download', ['file' => urlencode($value)]) }}"
                                    class="btn btn-primary download-btn" download="{{$value}}">{{ $value }}<i
                                        class="fa fa-download download-icon"></i></a>
                                @endforeach
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $productdetail->created_at)->format('m/d/Y')  }}
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="4" class="text-center">There are no data</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection