@extends('layouts.default')
@section('content')
<div class="row">
    <div class="container">
        <form method="POST" action="/date" enctype="multipart/form-data" id="search-form" role="form" style="margin-top: 3%; margin-bottom: 1%;">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="col-md-2"></div>
                    <div class="form-group col-md-3" id="query_form">
                            <span class="h5 mb-2">Start Date</span>
                            <input class="form-control"  type="date" id="start" name="start_date" required>
                    </div>
                    <div class="form-group col-md-3">
                        <span class="h5 mb-2">End Date</span>
                        <input class="form-control" type="date" id="end" name="end_date" required>
                    </div>
                    <div class="col-md-3" style="margin-top:2.5%;">
                        <input class="btn bg-secondary" id="s_button" type="submit" value="Filter Action">
                    </div>
            </div>
        </form>
    </div>
    
    <div class="col-10">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h4 class="mb-0">Activity Logs</h4>
                    </div>
                    <div class="col">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input bg-primary" id="customSwitch1">
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-body">
                @if(count($activities) > 0)

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>User_ID</th>
                            <th>User Name</th>
                            <th>Activity_status</th>
                            <th>Activity_title</th>
                            <th>SMS_count</th>
                            <th>Activity_Remark</th>
                            <th>Created_At_date_time</th>
                            <th>Updated_At_date_time</th>
                        </tr>
                    </thead>
                    @foreach ($activities as $activity)
                    <tbody>
                        <tr>
                        <td><a href="/activity/{{$activity->id}}">{{$activity->user_id}}</a></td>
                            <td><a href="/activity/{{$activity->id}}">{{$activity->user_name}}</a></td>
                            <td><a href="/activity/{{$activity->id}}">{{$activity->status}}</a></td>
                            <td><a href="/activity/{{$activity->id}}">{{$activity->activity_title}}</a></td>
                            <td><a href="/activity/{{$activity->id}}">{{$activity->SMS_count}}</a></td>
                            <td><a href="/activity/{{$activity->id}}">{{$activity->remark}}</a></td>
                            <td><a href="/activity/{{$activity->id}}">{{$activity->created_at}}</a></td>
                            <td><a href="/activity/{{$activity->id}}">{{$activity->updated_at}}</a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                {{-- {{$activities->links()}} --}}
                @else
                   <h1>No posts</h1>
                @endif
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Search for activities</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="activityGrid/query" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group">
                            <label for="inputUserId">UserID</label>
                            <input name="user_id" type="text" class="form-control" id="inputUserId" placeholder="Logger/userID">
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group">
                            <label for="inputLogTitlte">Title</label>
                            <input name="activity_title" type="text" class="form-control" id="inputUserName" placeholder="Activity Title">
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group">
                            <button type="submit" class="btn bg-secondary">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                Search
                            </button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
@stop
