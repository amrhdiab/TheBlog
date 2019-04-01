@extends('admin.layouts.app')
@section('title','Users')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Users
            <div class="pull-right">
                <a href="{{route('user.create')}}">Create new user</a>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-hover">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Delete</th>
                </tr>
                </thead>
                @if(count($users) > 0)
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><img style="max-height: 60px; max-width: 70px;"
                                     src="{{asset('storage/uploads/avatars').'/'.$user->profile->avatar}}"
                                     alt="user_avatar"></td>
                            <td>{{$user['name']}}</td>
                            <td>
                                @if($user['admin'])
                                    @if($user['owner'])
                                        <span class="label label-success">Site Owner</span>
                                    @else
                                        @if(Auth::user()->owner)
                                            <form action="{{route('make.author',$user['id'])}}" method="post">
                                                {{csrf_field()}}
                                                {{method_field('PATCH')}}
                                                <button type="submit" class="btn btn-xs btn-primary" name="submit">
                                                    Admin | change?
                                                </button>
                                            </form>
                                        @else
                                            <span class="label label-primary">Admin</span>
                                        @endif
                                    @endif
                                @else
                                    @if(Auth::user()->owner)
                                        <form action="{{route('make.admin',$user['id'])}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('PATCH')}}
                                            <button type="submit" class="btn btn-xs btn-primary" name="submit"
                                                    style="background-color: dimgray;border-color: dimgray">
                                                Author | change?
                                            </button>
                                        </form>
                                    @else
                                        <span class="label label-info">Author</span>
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if($user['owner'])
                                @else
                                    <form action="{{route('user.destroy',$user['id'])}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-xs btn-danger" name="submit">
                                            <i class="fa fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @else
                    <tr>
                        <td colspan="4" class="text-center">
                            No Users found.
                        </td>
                    </tr>
                @endif
            </table>
            {{$users->links()}}
        </div>
    </div>
@endsection