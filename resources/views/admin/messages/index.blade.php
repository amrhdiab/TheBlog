@extends('admin.layouts.app')
@section('title','User Messages')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            User Messages
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-hover">
                <thead>
                <tr>
                    <th>title</th>
                    <th>Sender</th>
                    <th>Email</th>
                    <th>Sent at</th>
                    <th>Delete</th>
                </tr>
                </thead>
                @if(count($messages) > 0)
                    <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <td><a href="{{route('admin.message.show',$message['id'])}}">{{$message['title']}}</a></td>
                            <td>{{$message['name']}}</td>
                            <td>{{$message['email']}}</td>
                            <td>{{$message['created_at']}}</td>
                            <td>
                                <form action="{{route('admin.message.destroy',$message['id'])}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-xs btn-danger" name="submit">
                                        <i class="fa fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @else
                    <tr>
                        <td colspan="5" class="text-center">
                            No Messages found.
                        </td>
                    </tr>
                @endif
            </table>
            {{$messages->links()}}
        </div>
    </div>
@endsection