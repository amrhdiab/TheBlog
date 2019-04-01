@extends('admin.layouts.app')
@section('title','Trashed Posts')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Trashed Posts
            <a href="{{route('post.index')}}" class="btn btn-sm btn-default pull-right">
                <i class="fa fa-backward"></i> Back</a>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-hover">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Restore</th>
                    <th>Delete Permanently</th>
                </tr>
                </thead>
                @if(count($posts) > 0)
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td><img style="max-height: 60px; max-width: 70px;" src="{{asset('storage/uploads/posts').'/'.$post['featured']}}" alt="featured_image"></td>
                            <td>{{$post['title']}}</td>
                            <td>
                                <form action="{{route('post.restore',$post['id'])}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('PATCH')}}
                                    <button type="submit" class="btn btn-xs btn-primary" name="submit">
                                        <i class="fa fa-undo-alt"></i> Restore
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('post.delete.trashed',$post['id'])}}" method="post">
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
                        <td colspan="4" class="text-center">
                            No trashed posts found.
                        </td>
                    </tr>
                    {{$posts->links()}}
                @endif
            </table>
        </div>
    </div>
@endsection