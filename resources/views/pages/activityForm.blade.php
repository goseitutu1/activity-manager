@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-10">
        <div class="card">
    <div class="card-header">
        <h4 class="mb-0">Insert Activity</h4>
    </div>
    <div class="card-body">
        <form method="post" action="activityGrid/post" enctype="multipart/form-data">
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
                    <input name="sms_count" type="number" class="form-control" id="inputUserName" placeholder="0">
                </div>
            </div>
            <fieldset class="border p-2">
                <legend class="w-auto">User</legend>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputUserId">UserID</label>
                        <input name="user_id" type="text" class="form-control" id="inputUserId" placeholder="Logger/userID">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputUserName">Username</label>
                        <input name="user_name" type="text" class="form-control" id="inputUserName" placeholder="Username">
                    </div>
                </div>
            </fieldset>
            <fieldset class="border p-2">
                <legend class="w-auto">Activity</legend>
                <div class="form-group">
                    <label for="inputActivityTitle">Title</label>
                    <input name="activity_title" type="text" class="form-control" id="inputActivityTitle" placeholder="mobile money">
                </div>
                <div class="form-group">
                    <label for="inputActivityRemark">Remark</label>
                    <input name="remark" type="text" class="form-control" id="inputActivityRemark" placeholder="Remark">
                </div>
            </fieldset>
            <br>
            <button type="submit" class="btn bg-secondary">
                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                Save
            </button>
        </form>
    </div>
</div>
    </div>
</div>

@stop
