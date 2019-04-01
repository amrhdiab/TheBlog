@extends('admin.layouts.app')
@section('title')
    {{$message['title']}}
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
           Message:  {{$message['title']}}
        </div>
        <div class="panel-body">
            <div class="card">
                <h3 class="text-info">{{$message['title']}}</h3>
                <hr>
                <p class="well">{{$message['content']}}</p>
                <hr>
                <small>Sent at: {{$message['created_at']}}</small>
                <br>
                <small>Sent by: {{$message['name']}}</small>
            </div>
        </div>
    </div>
@endsection