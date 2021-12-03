@extends('layouts.adminLayout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-offset-2 col-lg-8">


                <div class="row">
                    <div class="col-lg-6"><label for="">First Name</label></div>
                    <div class="col-lg-6">{{$customer->firstName}}</div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-lg-6"><label for="">Last Name</label></div>
                    <div class="col-lg-6">{{$customer->lastName}}</div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-lg-6"><label for="">Email</label></div>
                    <div class="col-lg-6">{{$customer->email}}</div>
                </div>
                <hr>



            </div>
        </div>
            <h1>Orders</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Address</th>
                            <th>Amount</th>
                            <th>Type</th>
                            <th>Dated</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customer->orders as $transaction)
                        <tr>
                            <td>{{ $transaction->orderId }}</td>
                            <td>{{ $transaction->report->address }}</td>
                            <td>{{ env('CURRENCY_SYMBOL').$transaction->total/100 }}</td>
                            <td class="text-capitalize">{{ $transaction->type }}</td>
                            <td>{{ $transaction->created_at }}</td>
                            <td><a href="{{URL::Route('reportDetails', ['reportId' => $transaction->reportId, 'userId' => $transaction->userId])}}" >View</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
               
            </div>

    </div>
@stop