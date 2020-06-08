@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(count($activities) > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Activity_title</th>
                                <th>Activity_status</th>
                                <th>SMS_count</th>
                                <th>Activity_Remark</th>
                                <th>Created_At_date_time</th>
                                <th>Last_time_updated</th>
                            </tr>
                        </thead>
                        @foreach ($activities as $index)
                        <tbody>
                            <tr>
                                <td>{{$index->activity_title}}</td>
                                <td class="card-header">{{$index->status}}</td>
                                <td>{{$index->SMS_count}}</td>
                                <td>{{$index->remark}}</td>
                                <td>{{$index->created_at}}</td>
                                <td class="btn btn-primary">{{$index->updated_at}}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    @else
                    Have no activity   
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
