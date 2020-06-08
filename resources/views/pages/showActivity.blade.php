@extends('layouts.default')
@section('content')
<div class="card-body">
    <div class="form-group">
        <a href="/activityGrid">
        <button type="submit" class="btn bg-secondary">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            Back
        </button>
        </a>
    </div>
    @if(count($activity) > 0)

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
        @foreach ($activity as $index)
        <tbody>
            <tr>
            <td>{{$index->user_id}}</td>
                <td>{{$index->user_name}}</td>
                <td>{{$index->status}}</td>
                <td>{{$index->activity_title}}</td>
                <td>{{$index->SMS_count}}</td>
                <td>{{$index->remark}}</td>
                <td>{{$index->created_at}}</td>
                <td>{{$index->updated_at}}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
    @else
       <h1>No posts</h1>
    @endif
    <a href="/activityGrid/{{$index->id}}/edit">
        <button type="submit" class="btn bg-secondary">
            <i class="fa fa-edit" aria-hidden="true"></i>
            Edit
        </button>
    </a>
        <form method="post" action="/activityGrid/{{$index->id}}" class="pull-right" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="delete" />
            {{ csrf_field() }}
            <button type="delete" class="btn bg-secondary">
                <i class="fa fa-file-minus" aria-hidden="true"></i>
                Delete
            </button>
        </form>
</div>
@stop