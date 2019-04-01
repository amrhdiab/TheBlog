@extends('admin.layouts.app')
@section('title','Update Category')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit category:  <i style="text-decoration: underline;"><strong>{{$category['name']}}</strong></i>
            <a href="{{route('category.index')}}" class="btn btn-sm btn-default pull-right">
                <i class="fa fa-backward"></i> Back
            </a>
        </div>
        <div class="panel-body">

            <form action="{{route('category.update',$category['id'])}}" method="post">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label for="title">Name:</label>
                    <input type="text" name="name" value="{{$category['name']}}" class="form-control" title="Name">
                </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </form>

        </div>
    </div>
@endsection