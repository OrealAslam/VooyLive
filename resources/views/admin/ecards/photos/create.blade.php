@extends('layouts.adminLayout')
@section('pageLevelCSS')
    <style type="text/css">
        .blank-image-preview-div{
            margin-top:-65%;
        }
        .blank-image-preview-div img{
            width: 100%;
        }
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="x_title">
            <div class="col-md-6">
                <h2>Ecards Photos Create</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('ecard.photo') }}" class="btn btn-success">Back</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <form action="{{ route('ecard.photo.store') }}" method="post" class="col-lg-12" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="" class="control-label">Select Category Name</label>
                    <select class="form-control type-se" name="ecards_categories_id">
                        <option value="">---Select Category---</option>
                        @foreach ($ecardCategory as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="" class="control-label">Enter Title</label>
                    <input type="text" name="title" placeholder="Enter Title.." class="form-control" value="{{ old('title') }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="" class="control-label">Sample Image</label>
                    <input type="file" name="sample_image" class="custom-file-input form-control" id="customFile">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Blank Image</label>
                    <div class="custom-file">
                        <input type="file" name="blank_image" class="custom-file-input blank-image-preview form-control" id="customFile">
                    </div>
                </div>  
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group coordinate-radio">
                            <input type="radio" name="coordinate" value="1" class="firstcoo"> First Coordinate
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-lable">X Greeting Coordinate</label>
                            <input type="text" name="x_greeting_coordinate" placeholder="Enter X Greeting Coordinate" class="form-control x" value="{{ old('x_greeting_coordinate') }}">
                        </div>    
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-lable">Y Greeting Coordinate</label>
                            <input type="text" name="y_greeting_coordinate" placeholder="Enter Y Greeting Coordinate" class="form-control y" value="{{ old('y_greeting_coordinate') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group coordinate-radio">
                            <input type="radio" name="coordinate" value="2" class="secondcoo"> Second Coordinate
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-lable">X Solution Coordinate</label>
                            <input type="text" name="x_solution_coordinate" placeholder="Enter X Solution Coordinate" class="form-control x2" value="{{ old('x_solution_coordinate') }}">
                        </div>    
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-lable">Y Solution Coordinate</label>
                            <input type="text" name="y_solution_coordinate" placeholder="Enter Y Solution Coordinate" class="form-control y2" value="{{ old('y_solution_coordinate') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group coordinate-radio">
                            <input type="radio" name="coordinate" value="3" class="thirdcoo"> Third Coordinate
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-lable">X Message Coordinate</label>
                            <input type="text" name="x_message_coordinate" placeholder="Enter X Message Coordinate" class="form-control x3" value="{{ old('x_message_coordinate') }}">
                        </div>    
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-lable">Y Message Coordinate</label>
                            <input type="text" name="y_message_coordinate" placeholder="Enter Y Message Coordinate" class="form-control y3" value="{{ old('y_message_coordinate') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group coordinate-radio">
                            <input type="radio" name="coordinate" value="4" class="thirdcoo"> Forth Coordinate
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-lable">X Signature Coordinate</label>
                            <input type="text" name="x_signature_coordinate" placeholder="Enter X Signature Coordinate" class="form-control x4" value="{{ old('x_signature_coordinate') }}">
                        </div>    
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-lable">Y Signature Coordinate</label>
                            <input type="text" name="y_signature_coordinate" placeholder="Enter Y Signature Coordinate" class="form-control y4" value="{{ old('y_signature_coordinate') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row preview-parent">
            <div class="col-md-6">
                <div class="blank-image-preview-div">
                </div>
            </div>
        </div>
        <br>
        <hr>
        <div class="form-group">
            <div class="col-md-12 text-center">
                <input type="submit" value="Add Ecards Photos" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>
@stop

@section('pageLevelJS')
<script type="text/javascript">

    function readURL(input) {
     for(var i =0; i< input.files.length; i++){
         if (input.files[i]) {
            var reader = new FileReader();
            reader.onload = function (e) {
               var img = $('<img id="dynamic">');
               img.attr('src', e.target.result);
               $('.blank-image-preview-div').html(img);
            }
            reader.readAsDataURL(input.files[i]);
           }
        }
    }

    $(".blank-image-preview").change(function(){
        readURL(this);
    });

    function readURLTransparent(input) {
     for(var i =0; i< input.files.length; i++){
         if (input.files[i]) {
            var reader = new FileReader();
            reader.onload = function (e) {
               var img = $('<img id="dynamic" style="width:100%;">');
               img.attr('src', e.target.result);
               $('.transparent-image-preview-div').html(img);
            }
            reader.readAsDataURL(input.files[i]);
           }
        }
    }

    $(".transparent-image-preview").change(function(){
        readURLTransparent(this);
    });

    $("body").on("click",".blank-image-preview-div img",function(e){
        var offset = $(this).offset();
        var val = $('input[name=coordinate]:checked').val();
        if(val == 1){
            $(".x").val(parseInt(e.pageX - offset.left));
            $(".y").val(parseInt(e.pageY - offset.top));   
        }else if(val == 2){
            $(".x2").val(parseInt(e.pageX - offset.left));
            $(".y2").val(parseInt(e.pageY - offset.top));     
        }else if(val == 3){
            $(".x3").val(parseInt(e.pageX - offset.left));
            $(".y3").val(parseInt(e.pageY - offset.top));     
        }else if(val == 4){
            $(".x4").val(parseInt(e.pageX - offset.left));
            $(".y4").val(parseInt(e.pageY - offset.top));     
        }
    });
</script>
@endsection