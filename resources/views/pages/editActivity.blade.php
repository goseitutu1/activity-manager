@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-10">
        <div class="card">
    <div class="card-header">
        <h4 class="mb-0">Insert Activity</h4>
    </div>
    <div class="card-body">
        @if( count($activity) > 0 )
        @foreach ( $activity as $item )
        <a href="/activity/{{$item->id}}">
            <button type="submit" class="btn bg-secondary">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
                Back
            </button>
        </a>
        <form method="post" action="/{{$item->id}}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put" />
            {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputUserId">Status</label>
                    <select name="status" id="inputStatus" class="form-control">
                        <option selected>Pending</option>
                        <option>Complete</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputUserName">SMS Count</label>
                <input value="{{$item->SMS_count}}" name="sms_count" type="number" class="form-control" id="inputUserName" placeholder="0">
                </div>
            </div>
            <fieldset class="border p-2">
                <legend class="w-auto">User</legend>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputUserId">UserID</label>
                    <input value="{{$item->user_id}}" name="user_id" type="text" class="form-control" id="inputUserId" placeholder="Logger/userID">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputUserName">Username</label>
                    <input value="{{$item->user_name}}" name="user_name" type="text" class="form-control" id="inputUserName" placeholder="Username">
                    </div>
                </div>
            </fieldset>
            <fieldset class="border p-2">
                <legend class="w-auto">Activity</legend>
                <div class="form-group">
                    <label for="inputActivityTitle">Title</label>
                <input value="{{$item->activity_title}}" name="activity_title" type="text" class="form-control" id="inputActivityTitle" placeholder="mobile money">
                </div>
                <div class="form-group">
                    <label for="inputActivityRemark">Remark</label>
                <input value="{{$item->remark}}" name="remark" type="text" class="form-control" id="inputActivityRemark" placeholder="Remark">
                </div>
            </fieldset>
            <fieldset class="border p-2">
                <legend class="w-auto">Date</legend>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCustomerTelephone">Today's date</label>
                    <input type="text" name="updated_at" class="form-control" id="inputCustomerTelephone" placeholder="YYYY-MM-DD HH-MM-SS">
                    </div>
                </div>
            </fieldset>
            <br>
            <button type="submit" class="btn bg-secondary">
                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                Save
            </button>
        </form>
        @endforeach
        @endif
    </div>
</div>
    </div>
</div>

@stop
