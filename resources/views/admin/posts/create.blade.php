@extends('admin.layouts.app')
@section('title','Create Post')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Create New Post
            <a href="{{route('post.index')}}" class="btn btn-sm btn-default pull-right">
                <i class="fa fa-backward"></i> Back</a>
        </div>
        <div class="panel-body">

            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" value="{{old('title')}}" class="form-control" title="Title">
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea name="content" id="article-ckeditor" cols="10" rows="10"
                              class="form-control">{{old('content')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Featured image:</label>
                    <input type="file" name="featured" value="{{old('featured')}}">
                </div>
                @if(count($categories) >0)
                    <div class="form-group">
                        <label for="categories">Select a category</label>
                        <select name="category_id" id="category" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                @if(count($tags) > 0)
                    <div class="form-group">
                        <label for="tags">Select tags</label>
                        <div>
                            @foreach($tags as $tag)
                                <input type="checkbox" value="{{$tag['id']}}" name="tags[]" style="margin: 5px" title="tags">
                                {{$tag['tag']}}
                            @endforeach
                        </div>
                    </div>
                @endif
                <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </form>

        </div>
    </div>
@endsection