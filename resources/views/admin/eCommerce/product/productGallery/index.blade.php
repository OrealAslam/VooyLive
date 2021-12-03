@extends('layouts.adminLayout')
@section('pageLevelCSS')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
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
    .dropzone .dz-preview .dz-image img{
        width: 100%;
    }
</style>


<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="row">
            <div class="x_title">
                <div class="col-md-6">
                    <h2>Product Gallery</h2>
                </div>
                <div class="col-md-6 text-right">
                    <!-- <a href="" class="btn btn-success">Add New Product Gallery</a> -->
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('dropzone.store') }}" class="dropzone" id="my-dropzone" enctype="multipart/form-data" method="POST" data-id="{{ $id }}">
                <input name="product_id" value="{{ $id }}" type="hidden"/>
                {{csrf_field()}}
                    <div class="fallback"> 
                        <input name="image" type="file" multiple/>
                    </div>
                </form>
            </div>
        </div>
            
    </div>
  </div>
</div>
@stop
    
@section('pageLevelJS')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<script type="text/javascript">
    var id = "{{ request()->id }}";
    var token = $('meta[name="csrf-token"]').attr('content');

    Dropzone.autoDiscover = false;

    var myDropzone = new Dropzone(".dropzone", { 
       maxFilesize: 10,
       acceptedFiles: ".jpeg,.jpg,.png,.gif",
       addRemoveLinks: true,
       removedfile: function(file) {
        var fileName = file.name; 
        $.ajax({
           type: 'POST',
           url: "{{ route('product.gallery.delete') }}",
           data: {_token:token,name: fileName,request: 'delete',id:id},
           sucess: function(data){
              $('.dz-message').css('display','none');
           }
         });
  
         var _ref;
          return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
       },
       init: function() { 
            myDropzone = this;
            $.ajax({
              url: "{{ route('product.gallery.image') }}",
              type: 'POST',
              data: {_token:token,id:id},
              dataType: 'json',
              success: function(response){
                $.each(response, function(key,value) {
                    $.each(value, function(skey,svalue) {
                        var mockFile = { name: svalue.name };
                        myDropzone.emit("addedfile", mockFile);
                        myDropzone.emit("thumbnail", mockFile, svalue.path);
                        myDropzone.emit("complete", mockFile);
                    });
                });

              }
            });
        }
    });

</script>
@endsection