@extends('admin.layouts.app')
@section('title','Create User')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Create New User
            <a href="{{route('user.index')}}" class="btn btn-sm btn-default pull-right">
                <i class="fa fa-backward"></i> Back</a>
        </div>
        <div class="panel-body">

            <form action="{{route('user.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Name:</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" title="Name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" title="Email">
                </div>
                <div class="form-group">
                    <label for="email">Permissions:</label>
                    <input type="radio" name="permission" value="0" title="Permission" style="margin-left: 5px" checked> Author
                    <input type="radio" name="permission" value="1" title="Permission" style="margin-left: 5px"> Admin
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password-confirm">Confirm Password:</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </form>

        </div>
    </div>
@endsection