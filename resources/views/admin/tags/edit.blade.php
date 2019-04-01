@extends('admin.layouts.app')
@section('title','Update Tag')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Tag:  <i style="text-decoration: underline;"><strong>{{$tag['tag']}}</strong></i>
            <a href="{{route('tag.index')}}" class="btn btn-sm btn-default pull-right">
                <i class="fa fa-backward"></i> Back
            </a>
        </div>
        <div class="panel-body">

            <form action="{{route('tag.update',$tag['id'])}}" method="post">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label for="title">Tag:</label>
                    <input type="text" name="tag" value="{{$tag['tag']}}" class="form-control" title="Tag">
                </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </form>

        </div>
    </div>
@endsection