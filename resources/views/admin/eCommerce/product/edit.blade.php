@extends('layouts.adminLayout')

@section('pageLevelCSS')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-toggle.css') }}">
    <style type="text/css">
        .display-none{
            display: none !important;
        }
        .display-block{
            display: block !important;
        }
    </style>
@stop

@section('content')
<div class="container">
    <form action="{{ route('product.update',$data->id)}}" enctype="multipart/form-data" method="post" class="col-lg-offset-1 col-lg-8">
        {{csrf_field()}}
        <div class="row" style="margin-top:20px;">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Select Category Name</label>
                    <select class="form-control type-se" name="cat_id">
                        <option>Select Category</option>
                        @foreach ($categoryName as $key => $value)
                            <option class="type" value="{{ $value->id }}" type="{{ $value->type }}" {{ ($data->cat_id == $value->id ? "selected" : "") }}>{{ $value->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Enter Name</label>
                    <input type="text" name="name" value="{{ $data->name }}" id=""class="form-control" placeholder="Enter Name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Enter Price</label>
                    <input type="text" name="price" value="{{ $data->price }}" id=""class="form-control" placeholder="Enter Price">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Enter Image</label>
                    <input type="file" name="image" value="{{ $data->file }}" id=""class="form-control" placeholder="Enter Image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Enter Code</label>
                    <input type="text" name="product_code" value="{{ $data->product_code }}" id="" class="form-control" placeholder="Enter Code">
                </div>
            </div>
             <div class="col-md-6 credit-price">
                <div class="form-group">
                    <label for="" class="control-label">Actual Price</label>
                    <input type="text" name="actual_price" value="{{ $data->actual_price }}" id=""class="form-control" placeholder="Actual Price">
                </div>
            </div>
            <div class="col-md-6 credit">
                <div class="form-group">
                    <label for="" class="control-label">Is Home Page</label><br>
                    <input data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" type="checkbox" name="is_home_page" {{ $data->is_home_page == 1 ? 'checked' : '' }}>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 10px;">
                <div class="form-group">
                    <label for="" class="control-label">Enter Description</label>
                    <textarea name="description" id="editor1" class="form-control" placeholder="Enter Description">{{ $data->description }}</textarea>
                </div>
            </div>
            <div class="col-md-12" style="margin-bottom:10px;">
                <h4>Availability Option</h4>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="" class="control-label">Availability</label><br>
                    <input data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" type="checkbox" name="availability" {{ $data->availability == 0 ? 'checked' : '' }}>
                </div>
            </div>
            <div class="credit">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="" class="control-label">Address</label><br>
                        <input data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" type="checkbox" name="address" {{ $data->address == 0 ? 'checked' : '' }}>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="" class="control-label">Uplaod Image</label><br>
                        <input data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" type="checkbox" name="upload_image" {{ $data->upload_image == 0 ? 'checked' : '' }}>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="" class="control-label">Neighborhood</label><br>
                        <input data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" type="checkbox" name="neighborhood" {{ $data->neighborhood == 0 ? 'checked' : '' }}>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top:20px;">
                    <hr>
                    <h4>Extra Option</h4>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="" class="control-label">Rush Delivery</label><br>
                        <input data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" type="checkbox" name="rush_delivery" class="rush-delivery" {{ $data->rush_delivery == 0 ? 'checked' : '' }}>
                    </div>
                </div>
                <div class="col-md-12 rush-delivery-option {{ $data->rush_delivery == 0 ? 'display-block' : 'display-none' }}" style="margin-top:20px;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Rush Delivery Day</label>
                                <input type="text" name="rush_delivery_day" id=""class="form-control rush_delivery_day" placeholder="Rush Delivery Day" data-value="{{ $data->rush_delivery_day }}" value="{{ $data->rush_delivery_day }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Rush Delivery Charge</label>
                                <input type="text" name="rush_delivery_charge" id=""class="form-control rush_delivery_charge" placeholder="Rush Delivery Charge" data-value="{{ $data->rush_delivery_charge }}" value="{{ $data->rush_delivery_charge }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="" class="control-label">Custom Charge</label><br>
                        <input data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" type="checkbox" name="custom_charge" class="custom-charge"  {{ $data->custom_charge == 0 ? 'checked' : '' }}>
                    </div>
                </div>
                <div class="col-md-12 custom-charge-option {{ $data->custom_charge == 0 ? 'display-block' : 'display-none' }}" style="margin-top:20px;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="control-label">Custom Design Charge</label>
                                <input type="text" name="custom_design_charge" id=""class="form-control custom_design_charge" placeholder="Custom Design Charge"  data-value="{{ $data->custom_design_charge }}" value="{{ $data->custom_design_charge }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center" style="margin:30px 0px;">
                <hr>
                <div class="form-group">
                    <input type="submit" value="Add Product" class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>
</div>

@stop
@section('pageLevelJS')
    <script src="{{ asset('js/bootstrap-toggle.js') }}"></script>
    <script src="https://cdn.gaic.com/cdn/ui-bootstrap/0.58.0/js/lib/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        $('body').on('change', '.rush-delivery', function () {
            if ($(this).prop('checked') == true) {
                var rush_delivery_day = $('.rush_delivery_day').attr('data-value');
                var rush_delivery_charge = $('.rush_delivery_charge').attr('data-value');
                $('.rush_delivery_day').val(rush_delivery_day);
                $('.rush_delivery_charge').val(rush_delivery_charge);
                $('.rush-delivery-option').removeClass('display-none');
                $('.rush-delivery-option').addClass('display-block');
            }else{
                $('.rush-delivery-option').removeClass('display-block');
                $('.rush-delivery-option').addClass('display-none');
                $('.rush_delivery_day').val('');
                $('.rush_delivery_charge').val('');
            }
        });
        $('body').on('change', '.custom-charge', function () {
            if ($(this).prop('checked') == true) {
                var custom_design_charge = $('.custom_design_charge').attr('data-value');
                $('.custom_design_charge').val(custom_design_charge);
                $('.custom-charge-option').removeClass('display-none');
                $('.custom-charge-option').addClass('display-block');
            }else{
                $('.custom-charge-option').removeClass('display-block');
                $('.custom-charge-option').addClass('display-none');
                $('.custom_design_charge').val('');
            }
        });  
        CKEDITOR.replace('editor1');

        // type select

        $(document).ready(function(){
            var type = $('option:selected', this).attr('type');
            if(type == '1'){
                $('.credit').css('display','none');
            }else{
                $('.credit').css('display','block');
            }
        });

        $('.type-se').change(function(){
            var type = $('option:selected', this).attr('type');
            if(type == '1'){
                $('.credit').css('display','none');
            }else{
                $('.credit').css('display','block');
            }
        });

        $(document).ready(function(){
            var type = $('option:selected', this).attr('type');
            if(type == '1'){
                $('.credit-price').css('display','block');
            }else{
                $('.credit-price').css('display','none');
            }
        });
        $('.type-se').change(function(){
            var type = $('option:selected', this).attr('type');
            if(type == '1'){
                $('.credit-price').css('display','block');
            }else{
                $('.credit-price').css('display','none');
            }
        });

    </script>
@stop