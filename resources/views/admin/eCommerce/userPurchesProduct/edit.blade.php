@extends('layouts.adminLayout')

@section('pageLevelCSS')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
    <style type="text/css">
        .form{
            border-top:4px solid #2A3F54;
            margin-top:10px;
            box-shadow:2px 2px 5px #a2a2a2;
            padding:20px 20px;
        }
        .bootstrap-tagsinput{
            width:100% !important;
        }
    </style>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="x_title">
            <div class="col-md-6">
                <h2>User Product Detail</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('user.product.detail.index',$userProductDetail->  user_product_id) }}" class="btn btn-success">Back</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1 form">
            <form action="{{ route('user.product.detail.update',$userProductDetail->id) }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="" class="control-label">Emails</label>
                    <div id="container" class="example example_markup">
                        <div class="bs-example">
                            <input type="text" name="emails[]" class="form-control email" value="{{ $emEmail ?? ''}}" data-role="tagsinput" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">File</label>
                    <input type="file" name="file[]" class="form-control" multiple="multiple">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Note</label>
                    <textarea class="form-control" name="note" id="editor1">{{ $userProductDetail->note }}</textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-primary pull-right">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('pageLevelJS')
    <script src="https://cdn.gaic.com/cdn/ui-bootstrap/0.58.0/js/lib/ckeditor/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script type="text/javascript">
         CKEDITOR.replace('editor1');
    </script>
    <script type="text/javascript">

$(function () {
  $("input")
    .on("change", function (event) {
      var $element = $(event.target);
          var $container = $element.closest(".example");

          if (!$element.data("tagsinput")) return;

          var val = $element.val();
          if (val === null) val = "null";
          var items = $element.tagsinput("items");
          console.log(items[items.length - 1]);

          $("code", $("pre.val", $container)).html(
            $.isArray(val)
              ? JSON.stringify(val)
              : '"' + val.replace('"', '\\"') + '"'
          );
          $("code", $("pre.items", $container)).html(
            JSON.stringify($element.tagsinput("items"))
          );

          console.log(val);
          console.log(items);
          console.log(JSON.stringify(val));
          console.log(JSON.stringify(items));

          console.log(items[items.length - 1]);
        })
        .trigger("change");
    });

    $("#button").click(function () {
      var input = $("input[name='tags']").tagsinput("items");
      console.clear();
      console.log(input);
      console.log(JSON.stringify(input));
      console.log(input[input.length - 1]);
    });

    </script>
@stop