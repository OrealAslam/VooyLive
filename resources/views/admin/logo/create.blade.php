@extends('layouts.adminLayout')

@section('content')
<div class="container">
    <div class="row">
        <div class="x_title">
            <div class="col-md-6">
                <h2>Create Logo</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('logo.index') }}" class="btn btn-success">Back</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="x_panel">
        <form action="{{ route('logo.store') }}" enctype="multipart/form-data" method="post" class="col-lg-offset-1 col-lg-8">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Logo</label>
                        <div id="dropzone" class="dropzone">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:20px;">
                <div class="col-md-12 text-center" style="margin:30px 0px;">
                    <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('pageLevelJS')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.css"/>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
<script>
$(document).ready(function () {
   Dropzone.autoDiscover = false;
   var i = 0;

   $("#dropzone").dropzone({
        url: "{{ route('logo.store') }}",
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        init: function() {
            this.on("sending", function(file, xhr, formData){
                formData.append("_token", $('meta[name="csrf-token"]').attr('content'));
            });
        },
      success: function (file, response) {
        ++i;
        $("form").append("<input type='hidden' class='LogoFile' name='files["+i+"]' value='"+response.name+"'>");
        
        return file.previewElement.classList.add("dz-success");
      },
    });
});
</script>
@endsection