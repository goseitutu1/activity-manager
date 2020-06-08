@extends('layouts.default')
@section('content')
<div class="card-body">
    <div class="form-group">
        <a href="/sms_log">
        <button type="submit" class="btn bg-secondary">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            Back
        </button>
        </a>
    </div>
    @if(count($post) > 0)

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
        @foreach ($post as $index)
        <tbody>
            <tr>
            <td>{{$index->user_id}}</td>
                <td>{{$index->user_name}}</td>
                <td>{{$index->SMS_title}}</td>
                <td>{{$index->SMS_description}}</td>
                <td>{{$index->customer_telephone}}</td>
                <td>{{$index->created_at}}</td>
                <td>{{$index->updated_at}}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
    @else
       <h1>No posts</h1>
    @endif
    <a href="/sms_log/{{$index->SMS_id}}/edit">
        <button type="submit" class="btn bg-secondary">
            <i class="fa fa-edit" aria-hidden="true"></i>
            Edit
        </button>
    </a>
        <form method="post" action="/delete/{{$index->SMS_id}}" class="pull-right" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="delete" />
            {{ csrf_field() }}
            <button type="delete" class="btn bg-secondary">
                <i class="fa fa-file-minus" aria-hidden="true"></i>
                Delete
            </button>
        </form>
</div>
@stop