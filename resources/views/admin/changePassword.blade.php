@extends('layouts.adminLayout')
@section('content')

    <div class="container">
        <form action="{{ route('adminUpdateProfileUserNameEmail') }}" method="post" class="col-lg-offset-1 col-md-10">
            {{csrf_field()}}
            <div class="row" style="margin-top:30px;">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="control-label">First Name</label>
                        <input type="text" name="first_name" id="" class="form-control" value="{{ auth::user()->firstName }}">    
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="control-label">Last Name</label>
                        <input type="text" name="last_name" id="" class="form-control" value="{{ auth::user()->lastName }}">    
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="control-label">Old Email</label>
                        <input type="email" name="email" id="" class="form-control" value="{{ auth::user()->email }}">    
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="control-label">New Email</label>
                        <input type="email" name="newEmail" id="" class="form-control" value="">    
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="update" value="Update" class="btn btn-primary pull-right">
            </div>
        </form>

        <form action="{{ route('adminUpdateProfile') }}" method="post" class="col-lg-offset-1 col-md-10">
            {{csrf_field()}}
            <div class="form-group">
                <label for="" class="control-label">Old Password</label>
                <input type="password" name="oldpassword" id="" class="form-control" value="" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="" class="control-label">New Password</label>
                <input type="password" name="newpassword" id="" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="" class="control-label">Re-Password</label>
                <input type="password" name="repassword" id="" class="form-control" value="">
            </div>
            <div class="form-group">
                <input type="submit" name="update" value="Update" class="btn btn-primary pull-right">
            </div>
        </form>

    </div>

@stop