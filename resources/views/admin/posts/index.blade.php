@extends('admin.layouts.app')
@section('title','Published Posts')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Published Posts
            <div class="pull-right">
                <a href="{{route('post.create')}}">Create new post</a> |
                <a href="{{route('post.trashed')}}">Trashed posts</a>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-hover">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Edit</th>
                    <th>Trash</th>
                </tr>
                </thead>
                @if(count($posts) > 0)
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td><img style="max-height: 60px; max-width: 70px;"
                                     src="{{asset('storage/uploads/posts').'/'.$post['featured']}}"
                                     alt="featured_image"></td>
                            <td>{{$post['title']}}</td>
                            <td>{{$post->user['name']}}</td>
                            <td><a href="{{route('post.edit', $post['id'])}}" class="btn btn-xs btn-info"><i
                                            class="fa fa-pencil-alt"></i> Edit</a></td>
                            <td>
                                <form action="{{route('post.destroy',$post['id'])}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-xs btn-danger" name="submit">
                                        <i class="fa fa-trash-alt"></i> Trash
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @else
                    <tr>
                        <td colspan="5" class="text-center">
                            No Posts found.
                        </td>
                    </tr>
                @endif
            </table>
            {{$posts->links()}}
        </div>
    </div>
@endsection