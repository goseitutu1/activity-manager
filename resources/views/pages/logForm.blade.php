@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Insert Log</h4>
            </div>
            <div class="card-body">
                <form method="post" action="sms_log/post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <fieldset class="border p-2">
                        <legend class="w-auto">User</legend>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputUserId">UserID</label>
                                <input type="text" name="user_id" class="form-control" id="inputUserId" placeholder="Logger/userID">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputUserName">Username</label>
                                <input type="text" name="user_name" class="form-control" id="inputUserName" placeholder="Username">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="border p-2">
                        <legend class="w-auto">SMS</legend>
                        <div class="form-group">
                            <label for="inputSMSTitle">Title</label>
                            <input type="text" name="SMS_title" class="form-control" id="inputSMSTitle" placeholder="mobile money">
                        </div>
                        <div class="form-group">
                            <label for="inputSMSDescription">Description</label>
                            <input type="text" name="SMS_description" class="form-control" id="inputSMSDescription" placeholder="Description">
                        </div>
                    </fieldset>
                    <fieldset class="border p-2">
                        <legend class="w-auto">Customer</legend>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCustomerTelephone">Telephone</label>
                                <input type="text" name="customer_telephone" class="form-control" id="inputCustomerTelephone">
                            </div>
                        </div>
                    </fieldset>
                    <br>
                    <button type="submit" class="btn bg-secondary">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
