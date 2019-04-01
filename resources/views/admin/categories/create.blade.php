@extends('admin.layouts.app')
@section('title','Create Category')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Create New Category
            <a href="{{route('category.index')}}" class="btn btn-sm btn-default pull-right">
                <i class="fa fa-backward"></i> Back
            </a>
        </div>
        <div class="panel-body">

            <form action="{{route('category.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Name:</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" title="Name">
                </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </form>

        </div>
    </div>
@endsection