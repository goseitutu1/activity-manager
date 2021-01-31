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
                @if(count($data) > 0)

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>User_ID</th>
                            <th>User Name</th>
                            <th>Activity_status</th>
                            <th>Activity_title</th>
                            <th>SMS_count</th>
                            <th>Activity_remark</th>
                            <th>Created_At_date_time</th>
                            <th>Updated_At_date_time</th>
                        </tr>
                    </thead>
                    @foreach ($data as $item)
                    <tbody>
                        <tr>
                        <td><a href="/activity/{{$item->id}}">{{$item->user_id}}</a></td>
                            <td><a href="/activity/{{$item->id}}">{{$item->user_name}}</a></td>
                            <td><a href="/activity/{{$item->id}}">{{$item->status}}</a></td>
                            <td><a href="/activity/{{$item->id}}">{{$item->activity_title}}</a></td>
                            <td><a href="/activity/{{$item->id}}">{{$item->SMS_count}}</a></td>
                            <td><a href="/activity/{{$item->id}}">{{$item->remark}}</a></td>
                            <td><a href="/activity/{{$item->id}}">{{$item->created_at}}</a></td>
                            <td><a href="/activity/{{$item->id}}">{{$item->updated_at}}</a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                @else
                   <h1>No posts</h1>
                @endif
            </div>
        </div>
         <a href="/activityGrid">
            <button type="submit" class="btn bg-secondary">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
                Back
            </button>
        </a>
    </div> 
@stop