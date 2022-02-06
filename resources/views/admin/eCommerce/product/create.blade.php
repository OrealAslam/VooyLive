@extends('layouts.adminLayout')

@section('pageLevelCSS')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-toggle.css') }}">
@stop

@section('content')
<div class="container">
    <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="post" class="col-lg-offset-1 col-lg-8">
        {{csrf_field()}}
        <div class="row" style="margin-top:20px;">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Select Category Name</label>
                    <select class="form-control type-se" name="cat_id">
                        <option>Select Category</option>
                        @foreach ($categoryName as $key => $value)
                            <option class="type" value="{{ $value->id }}" type="{{ $value->type }}">{{ $value->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Enter Name</label>
                    <input type="text" name="name" id=""class="form-control" placeholder="Enter Name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Enter Price</label>
                    <input type="text" name="price" id=""class="form-control" placeholder="Enter Price">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Enter Image</label>
                    <input type="file" name="image" id=""class="form-control" placeholder="Enter Image">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Enter Code</label>
                    <input type="text" name="product_code" id=""class="form-control" placeholder="Enter Code">
                </div>
            </div>
             <div class="col-md-6 credit-price">
                <div class="form-group">
                    <label for="" class="control-label">Actual Price</label>
                    <input type="text" name="actual_price" id=""class="form-control" placeholder="Actual Price">
                </div>
            </div>
            <div class="col-md-6 credit">
                <div class="form-group">
                    <label for="" class="control-label">Is Home Page</label><br>
                    <input data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" type="checkbox" name="is_home_page">
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 10px;">
                <div class="form-group">
                    <label for="" class="control-label">Enter Description</label>
                    <textarea name="description" class="form-control" id="editor1" placeholder="Enter Description"></textarea>
                </div>
            <hr>
            </div>

            <div class="col-md-12">
                <h2>French</h2>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Enter Name Fr</label>
                    <input type="text" name="name_fr" class="form-control" placeholder="Enter Name Fr">
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 10px;">
                <div class="form-group">
                    <label for="" class="control-label">Enter Description Fr</label>
                    <textarea name="description_fr" class="form-control" id="editor2" placeholder="Enter Description Fr"></textarea>
                </div>
            <hr>
            </div>

            <div class="col-md-12" style="margin-bottom:10px;">
                <h4>Availability Option</h4>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="" class="control-label">Availability</label><br>
                    <input data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" type="checkbox" name="availability">
                </div>
            </div>
            <div class="credit">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="" class="control-label">Address</label><br>
                    <input data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" type="checkbox" name="address">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="" class="control-label">Uplaod Image</label><br>
                    <input data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" type="checkbox" name="upload_image">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="" class="control-label">Neighborhood</label><br>
                    <input data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" type="checkbox" name="neighborhood">
                </div>
            </div>
            <div class="col-md-12" style="margin-top:20px;">
                <hr>
                <h4>Extra Option</h4>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="" class="control-label">Rush Delivery</label><br>
                    <input data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" type="checkbox" name="rush_delivery" class="rush-delivery">
                </div>
            </div>

            <div class="col-md-12 rush-delivery-option" style="margin-top:20px;display:none;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Rush Delivery Day</label>
                            <input type="text" name="rush_delivery_day" id=""class="form-control" placeholder="Rush Delivery Day">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Rush Delivery Charge</label>
                            <input type="text" name="rush_delivery_charge" id=""class="form-control" placeholder="Rush Delivery Charge">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="" class="control-label">Custom Charge</label><br>
                    <input data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger" type="checkbox" name="custom_charge" class="custom-charge">
                </div>
            </div>

            <div class="col-md-12 custom-charge-option" style="margin-top:20px;display:none;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Custom Design Charge</label>
                            <input type="text" name="custom_design_charge" id=""class="form-control" placeholder="Custom Design Charge">
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
                $('.rush-delivery-option').css('display','block');
            }else{
                $('.rush-delivery-option').css('display','none');
            }
        });
        $('body').on('change', '.custom-charge', function () {
            if ($(this).prop('checked') == true) {
                $('.custom-charge-option').css('display','block');
            }else{
                $('.custom-charge-option').css('display','none');
            }
        }); 

        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');

        // type select
        
        $('.type-se').change(function(){
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
                $('.credit-price').css('display','block');
            }else{
                $('.credit-price').css('display','none');
            }
        });
    </script>
@stop