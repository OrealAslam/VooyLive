@extends('layouts.template')

@section('customStyle')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-toggle.min.css') }}">
    <style type="text/css">
        .box-hr{
            margin:0px 0px 12px;
        }
        .toggle{
            width:132px !important;
        }
        .toggle{
            line-height: 39px !important;
        }
        .toggle-off.btn{
            padding-left: 50px;
        }
        .toggle-on.btn {
            padding-right: 50px;
        }
        .planMember{
            background:#f5f5f5;
            margin-bottom: 15px;
            border-radius: 5px;
            box-shadow: 0px 0px 2px black;
            padding: 10px;
        }
        .planMember span{
            background: #EA2448;
            margin-left: 2px;
            margin-right: 6px;
            color: #fff;
            padding: 4px;
            text-align: center;
            border-radius: 50%;
            font-size: 12px;
        }
        .lable-user-limit{
            background: #EA2448;
            color: #fff;
        }
        .planMember label{
            background: #EA2448;
            color: #fff;
            height:25px;
            width:26px;
            padding-top:2px;
            text-align: center;
            font-size:12px;
            border-radius:50%;
        }
    </style>
@endsection

@section('content')
<!-- Page Header -->
<div class="page-header style-11">
    <div class="container">
        <h2 class="page-title">Users List</h2>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="active">Users List</li>
        </ol>
    </div>
</div>
<!-- Page Header End -->
<div class="cps-main-wrap">
    <!-- FAQ -->
    <div class="cps-section cps-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-md-offset-10 text-center">
                    <div class="planMember">
                        <p class="lable-user-limit"><i class="fa fa-users" aria-hidden="true"></i> Users</p>
                        <p><strong>Limit :</strong> <label> {{ Auth::user()->planMaster->team_member }}</label><br><hr class="box-hr"> <strong>Left :</strong> <label> {{ Auth::user()->planMaster->team_member - $userCreateSubUser }}</label></p>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 text-right">
                    @if($userCreateSubUser < Auth::user()->planMaster->team_member)
                        <a href="{{ Route('create.sub.user') }}" class="btn btn-primary">Create Sub User</a>
                    @else
                        @if(teamMember()['team_member'] >= getMaxTeamMember())
                            <div class="alert alert-danger text-center" role="alert">
                                You reach limit of created users, You can only create {{ Auth::user()->planMaster->team_member }} users with this team plan.
                            </div>
                        @else
                            <div class="alert alert-danger text-center" role="alert">
                                You reach limit of created users, You can only create {{ Auth::user()->planMaster->team_member }} users with this team plan.
                                <a href="{{ url('/account/manage') }}" class="btn btn-primary">Update Plan</a>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="col-md-12 col-xs-12 mt-10">
                    <div class="append alert alert-success" role="alert" style="display: none;">
                        User Active successfully.
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 mt-10">
                    <div class="append-danger alert alert-success" role="alert" style="display: none;">
                        User No Active successfully.
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="cps-faq-accordion">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Team Leader Name</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Create Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($usersList))
                                        @foreach($usersList as $key=>$value)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ Auth::User()->firstName }} {{ Auth::User()->lastName }}</td>
                                                <td>{{ $value->firstName }}</td>
                                                <td>{{ $value->lastName }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>
                                                    <!-- @if($value->verified == 0)
                                                        Deactive
                                                    @else
                                                        Active
                                                    @endif -->

                                                    @if($value->verified == 1)
                                                        <input type="checkbox" name="status" data-on="Active" data-off="No Active"  checked data-onstyle="success" class="change-status toggle" data-offstyle="danger" data-size="xs" data-toggle="toggle" data-id="{{ $value->userId }}">
                                                    @else
                                                        <input type="checkbox" name="status" data-on="Active" data-off="No Active" data-onstyle="success" class="change-status toggle" data-offstyle="danger" data-size="xs" data-toggle="toggle" data-id="{{ $value->userId }}">
                                                    @endif
                                                </td>
                                                <td>{{ $value->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="text-center">
                                            <td colspan="6">No Data Found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_script')
<script type="text/javascript">
    $('body').on('change','.change-status',function () {
    var status = $(this).prop('checked') == true ? '1' : '0';
    var id = $(this).data('id');
    var url = '/change-verified/'+id;
        $.ajax({
            url: url,
            method: "POST",
            data: {_token:token,status:status},
            success: function(data){
                console.log(data.success);
                if(data.success){
                    $(".append").show().delay(2000).fadeOut();
                    $('.append-danger').hide();
                }else{
                    $('.append').hide();
                    $(".append-danger").show().delay(2000).fadeOut();
                }
            }
        });
    });
</script>
@endsection