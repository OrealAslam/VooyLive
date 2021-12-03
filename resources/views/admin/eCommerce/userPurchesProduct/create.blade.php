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
                <a href="{{ route('user.product.detail.index',$id) }}" class="btn btn-success">Back</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1 form">
            <form action="{{ route('user.product.detail.store') }}" method="post"  enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="" class="control-label">Emails</label>
                    <div id="container" class="example example_markup">
                        <div class="bs-example">
                            <input type="text" name="emails[]" class="form-control email" value="{{ $userdata['email'] }}" data-role="tagsinput" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="control-label">File</label>
                    <input type="file" name="file[]" class="form-control" multiple="multiple">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Note</label>
                    <textarea class="form-control" name="note" rows="5" id="editor1">
                        Dear  {{ $userName }}, <br><br>

                        Your proof is now ready. If you are satisfied with the design as it is, this is a print-ready file. <br>
                        Use Adobe to view your proof for the best results.<br>
                        <a href="{{ Route('profileview') }}">Check my account</a><br><br>

                        6 Quick tips... For printing Community Feature Sheets®. <br><br>

                        When you order a Community Feature Sheets®, you will want to maintain that <strong> &quot;wow&quot;</strong> factor once it is printed. Here are a few tips to achieve the best printing quality: <br><br>

                        Use standard 8.5'x11' paper. <br>
                        Print the Community Feature Sheet® on one page, double-sided. <br>
                        Choose a coated paper for presentation. <br>
                        A brighter white paper makes for more crisp images and colours. <br>
                        Choose a heavier weighted paper for durability.<br>
                        Inkjet/Laser printers or color lasers ensure the greatest quality.<br><br>

                        Thank you for your purchase and good luck with the sale! <br>
                        Best regards,

                    </textarea>

                    <!-- <textarea class="form-control" name="note" rows="5" id="editor1">
                        Dear  {{ $userName }}, <br><br>

                        Your proof is now ready. If you are satisfied with the design as it is, this is a print ready file. <br>
                        Use Adobe <a href="{{ Route('profileview') }}">Check my account</a> your proof for best results. <br><br>

                        6 Quick tips... For printing Community Feature Sheets®. <br><br>

                        When you order a Community Feature Sheets®, you will want to maintain that &quot;wow&quot; factor once it is printed. Here are a few tips to achieve the best printing quality: <br><br>

                        Use standard 8.5'x11' paper. <br>
                        Print the Community Feature Sheet® on one page, double-sided. <br>
                        Choose a coated paper for presentation. <br>
                        A brighter white paper makes for more crisp images and colours. <br>
                        Choose a heavier weighted paper for durability.<br>
                        Inkjet/Laser printers or color lasers ensure the greatest quality.<br><br>

                        Thank you, <br>
                        The CFS Team
                    </textarea> -->
                </div>
                <div class="form-group">
                    <input type="hidden" name="user_product_id" value="{{ $id }}">
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