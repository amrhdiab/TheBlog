@extends('admin.layouts.app')
@section('title','Tags')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Tags
            <div class="pull-right">
                <a href="{{route('tag.create')}}">Create new tag</a> |
                <a href="{{route('tag.trashed')}}">Trashed tags</a>
            </div>
        </div>
        <div class="panel-body">

            <table class="table table-responsive table-hover">
                <thead>
                <tr>
                    <th>Tag</th>
                    <th>Edit</th>
                    <th>Trash</th>
                </tr>
                </thead>
                @if(count($tags) > 0)
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag['tag']}}</td>
                            <td><a href="{{route('tag.edit', $tag['id'])}}" class="btn btn-xs btn-info"><i
                                            class="fa fa-pencil-alt"></i> Edit</a></td>
                            <td>
                                <form action="{{route('tag.destroy',$tag['id'])}}" method="post">
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
                        <td colspan="4" class="text-center">
                            No tags found.
                        </td>
                    </tr>
                @endif
            </table>
            {{$tags->links()}}
        </div>
    </div>
@endsection