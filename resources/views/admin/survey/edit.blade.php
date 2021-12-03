@extends('layouts.adminLayout')

@section('pageLevelCSS')
    <style type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/css/bootstrap-colorpicker.css"></style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="x_title">
            <div class="col-md-6">
                <h2>Survey Creation Date Edit</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('surveyList') }}" class="btn btn-success">Back Survey</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <form action="{{ route('user.survey.update.created.date',$data->id) }}" method="post" class="col-lg-offset-1 col-lg-8">
        {{csrf_field()}}

        <div class="form-group">
            <label for="" class="control-label">Creation Date</label>
            <input type="date" name="created_at" class="form-control" value="{{ $date }}" placeholder="Enter Name">
        </div>

        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-primary pull-right">
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