@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Edit Log</h4>
            </div>
            <div class="card-body">
                @if( count($log) > 0 )
                @foreach ( $log as $item )
                <a href="/sms_log/{{$item->SMS_id}}">
                    <button type="submit" class="btn bg-secondary">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        Back
                    </button>
                </a>
                <form action="/update/{{$item->SMS_id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="put" />
                    {{ csrf_field() }}
                    <fieldset class="border p-2">
                        <legend class="w-auto">User</legend>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputUserId">UserID</label>
                            <input value="{{$item->user_id}}"  type="text" name="user_id" class="form-control" id="inputUserId" placeholder="Logger/userID">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputUserName">Username</label>
                            <input value="{{$item->user_name}}" type="text" name="user_name" class="form-control" id="inputUserName" placeholder="Username">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="border p-2">
                        <legend class="w-auto">SMS</legend>
                        <div class="form-group">
                            <label for="inputSMSTitle">Title</label>
                        <input value="{{$item->SMS_title}}" type="text" name="SMS_title" class="form-control" id="inputSMSTitle" placeholder="mobile money">
                        </div>
                        <div class="form-group">
                            <label for="inputSMSDescription">Description</label>
                        <input value="{{$item->SMS_description}}" type="text" name="SMS_description" class="form-control" id="inputSMSDescription" placeholder="Description">
                        </div>
                    </fieldset>
                    <fieldset class="border p-2">
                        <legend class="w-auto">Customer</legend>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCustomerTelephone">Telephone</label>
                            <input value="{{$item->customer_telephone}}" type="text" name="customer_telephone" class="form-control" id="inputCustomerTelephone">
                            </div>
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
                        Save</button>
                </form>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@stop
