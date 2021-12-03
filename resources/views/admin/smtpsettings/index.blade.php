@extends('layouts.adminLayout')
@section('content')

    <div class="container">

    <!-- <form action="{{route('smtp.settings.mail')}}" method="post" class="col-lg-offset-1 col-md-10">
        {{ csrf_field() }}
        <input type="text" name="subject">
        <input type="text" name="message">
        <button type="submit">submit</button>
    </form> -->

      <form action="{{route('smtp.settings.store')}}" method="post" class="col-lg-offset-1 col-md-10">
          {{ csrf_field() }}
            <div class="row" style="margin-top:30px;">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="control-label">MAIL_DRIVER</label>
                        <input type="text" name="mail_driver" id="" class="form-control" value="{{$data == null ? " " : $data->mail_driver}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="control-label">MAIL_HOST</label>
                        <input type="text" name="mail_host" id="" class="form-control" value="{{$data == null ? " " : $data->mail_host}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="control-label">MAIL_PORT</label>
                        <input type="text" name="mail_port" id="" class="form-control" value="{{  $data == null ? " " : $data->mail_port}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="control-label">MAIL_USERNAME</label>
                        <input type="text" name="mail_username" id="" class="form-control" value="{{$data == null ? " " : $data->mail_username}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="control-label">MAIL_PASSWORD</label>
                        <input type="text" name="mail_password" id="" class="form-control" value="{{$data == null ? " " : $data->mail_password}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="control-label">MAIL_ENCRYPTION</label>
                        <input type="text" name="mail_encryption" id="" class="form-control" value="{{$data == null ? " " : $data->mail_encryption}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="control-label">MAIL_FROM_ADDRESS</label>
                        <input type="email" name="mail_from_address" id="" class="form-control" value="{{$data == null ? " " : $data->mail_from_address}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="control-label">MAIL_ADMIN_EMAIL</label>
                        <input type="email" name="mail_admin_email" id="" class="form-control" value="{{$data == null ? " " : $data->mail_admin_email}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="control-label">MAIL_FROM_NAME</label>
                        <input type="text" name="mail_from_name" id="" class="form-control" value="{{$data == null ? " " : $data->mail_from_name}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Update" class="btn btn-primary pull-right">
            </div>
        </form>



    </div>

@stop