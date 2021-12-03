@extends('layouts.adminLayout')

@section('pageLevelCSS')
    <style type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/css/bootstrap-colorpicker.css"></style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="x_title">
            <div class="col-md-6">
                <h2>Profile Colour Create</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('profileColours') }}" class="btn btn-success">Back Profile Colour</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <form action="{{ route('profile.colour.store') }}" method="post" class="col-lg-offset-1 col-lg-8">
        {{csrf_field()}}

        <div class="form-group">
            <label for="" class="control-label">Enter Name</label>
            <input type="text" name="name" id=""class="form-control" placeholder="Enter Name">
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Headings</label>
                    <input type="color" name="headings" id="" class="form-control color-picker" placeholder="Headings">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Sub Headings</label>
                    <input type="color" name="sub_headings" id=""class="form-control" placeholder="Sub Headings">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Footer</label>
                    <input type="color" name="footer" id=""class="form-control" placeholder="Footer">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Background 1</label>
                    <input type="color" name="background_1" id=""class="form-control" placeholder="Background 1">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Background 2</label>
                    <input type="color" name="background_2" id=""class="form-control" placeholder="Background 2">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label">Icons Only</label>
                    <input type="color" name="icons_only" id=""class="form-control" placeholder="Icons Only">
                </div>        
            </div>
        </div>
        <hr>
        <div class="form-group">
            <input type="submit" value="Add Profile Colour" class="btn btn-primary pull-right">
        </div>
    </form>
</div>
@stop

@section('pageLevelJS')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript">
    $(function(){
        $('.color-picker').colorpicker();
    });
</script>
@endsection