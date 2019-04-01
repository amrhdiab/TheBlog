@extends('admin.layouts.app')
@section('title','Create Tag')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Create New Tag
            <a href="{{route('tag.index')}}" class="btn btn-sm btn-default pull-right">
                <i class="fa fa-backward"></i> Back
            </a>
        </div>
        <div class="panel-body">

            <form action="{{route('tag.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="tag">Tag:</label>
                    <input type="text" name="tag" value="{{old('tag')}}" class="form-control" title="tag">
                </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </form>

        </div>
    </div>
@endsection