@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h4 class="mb-0">Logs</h4>
                    </div>
                    <div class="col">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input bg-primary" id="customSwitch1">
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-body">
                @if(count($sms_logs) > 0)

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>User_ID</th>
                            <th>User Name</th>
                            <th>SMS Title</th>
                            <th>SMS Description</th>
                            <th>Customer Telephone</th>
                            <th>Created_At_date_time</th>
                            <th>Updated_At_date_time</th>
                        </tr>
                    </thead>
                    @foreach ($sms_logs as $sms_log)
                    <tbody>
                        <tr>
                        <td><a href="/sms_log/{{$sms_log->SMS_id}}">{{$sms_log->user_id}}</a></td>
                            <td><a href="/sms_log/{{$sms_log->SMS_id}}">{{$sms_log->user_name}}</a></td>
                            <td><a href="/sms_log/{{$sms_log->SMS_id}}">{{$sms_log->SMS_title}}</a></td>
                            <td><a href="/sms_log/{{$sms_log->SMS_id}}">{{$sms_log->SMS_description}}</a></td>
                            <td><a href="/sms_log/{{$sms_log->SMS_id}}">{{$sms_log->customer_telephone}}</a></td>
                            <td><a href="/sms_log/{{$sms_log->SMS_id}}">{{$sms_log->created_at}}</a></td>
                            <td><a href="/sms_log/{{$sms_log->SMS_id}}">{{$sms_log->updated_at}}</a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                @else
                   <h1>No posts</h1>
                @endif
            </div>
        </div>
         <a href="/sms_log">
            <button type="submit" class="btn bg-secondary">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
                Back
            </button>
        </a>
    </div> 
@stop
