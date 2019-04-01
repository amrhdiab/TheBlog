@extends('admin.layouts.app')
@section('title','Edit Profile')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Profile
        </div>
        <div class="panel-body">

            <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label for="title">Name:</label>
                    <input type="text" name="name" value="{{$user['name']}}" class="form-control" title="Name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="{{$user['email']}}" class="form-control" title="Email">
                </div>
                <div class="form-group">
                    <label for="email">Biography:</label>
                    <textarea name="bio" id="article-ckeditor" cols="30" rows="7"
                              class="form-control">{{$user->profile->bio}}</textarea>
                </div>
                <div class="form-group">
                    <label for="password">New Password:</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password-confirm">Confirm Password:</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Facebook:</label>
                    <input type="url" name="facebook" value="{{$user->profile['facebook']}}" class="form-control"
                           title="facebook">
                </div>
                <div class="form-group">
                    <label for="email">Youtube:</label>
                    <input type="url" name="youtube" value="{{$user->profile['youtube']}}" class="form-control"
                           title="youtube">
                </div>
                <div class="form-group">
                    <label for="email">Avatar:</label>
                    <img class="pull-right" src="{{asset('/storage/uploads/avatars/')}}/{{$user->profile['avatar']}}"
                         alt="avatar" style="max-height: 60px; max-width: 70px;">
                    <input type="file" name="avatar" title="youtube">
                </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </form>

        </div>
    </div>
@endsection