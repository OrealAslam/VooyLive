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
        <h2 class="page-title">{{__('userList.usersList')}}</h2>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">{{__('userList.home')}}</a></li>
            <li class="active">{{__('userList.usersList')}}</li>
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
                        <p class="lable-user-limit"><i class="fa fa-users" aria-hidden="true"></i> {{__('userList.users')}}</p>
                        <p><strong>{{__('userList.limit')}}</strong> <label> {{ Auth::user()->planMaster->team_member }}</label><br><hr class="box-hr"> <strong>{{__('userList.left')}}</strong> <label> {{ Auth::user()->planMaster->team_member - $userCreateSubUser }}</label></p>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 text-right">
                    @if($userCreateSubUser < Auth::user()->planMaster->team_member)
                        <a href="{{ Route('create.sub.user') }}" class="btn btn-primary">{{__('userList.createSubUser')}}</a>
                    @else
                        @if(teamMember()['team_member'] >= getMaxTeamMember())
                            <div class="alert alert-danger text-center" role="alert">
                                {{__('userList.reachLimitOfCreatedUsers')}} {{ Auth::user()->planMaster->team_member }} {{__('userList.usersWithTeamPlan')}}
                            </div>
                        @else
                            <div class="alert alert-danger text-center" role="alert">
                                {{__('userList.reachLimitOfCreatedUsers')}} {{ Auth::user()->planMaster->team_member }} {{__('userList.usersWithTeamPlan')}}
                                <a href="{{ url('/account/manage') }}" class="btn btn-primary">{{__('userList.updatePlan')}}</a>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="col-md-12 col-xs-12 mt-10">
                    <div class="append alert alert-success" role="alert" style="display: none;">
                        {{__('userList.userActiveSuccessfully')}}
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 mt-10">
                    <div class="append-danger alert alert-success" role="alert" style="display: none;">
                        {{__('userList.userNoActiveSuccessfully')}}
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="cps-faq-accordion">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('userList.teamLeaderName')}}</th>
                                        <th>{{__('userList.firstName')}}</th>
                                        <th>{{__('userList.lastName')}}</th>
                                        <th>{{__('userList.email')}}</th>
                                        <th>{{__('userList.status')}}</th>
                                        <th>{{__('userList.createDate')}}</th>
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
                                            <td colspan="6">{{__('userList.noDataFound')}}</td>
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