@extends('admin.layouts.app')
@section('title','Trashed Tags')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Trashed Tags
            <a href="{{route('tag.index')}}" class="btn btn-sm btn-default pull-right">
                <i class="fa fa-backward"></i> Back
            </a>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-hover">
                <thead>
                <tr>
                    <th>Tag</th>
                    <th>Restore</th>
                    <th>Delete Permanently</th>
                </tr>
                </thead>
                @if(count($trashedTags) > 0)
                    <tbody>
                    @foreach($trashedTags as $trashedTag)
                        <tr>
                            <td>{{$trashedTag['tag']}}</td>
                            <td>
                                <form action="{{route('tag.restore',$trashedTag['id'])}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('PATCH')}}
                                    <button type="submit" name="submit" class="btn btn-xs btn-primary">
                                        <i class="fa fa-undo-alt"></i> Restore
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('tag.delete.trashed',$trashedTag['id'])}}" method="post">
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
                            No trashed tags found.
                        </td>
                    </tr>
                    {{$trashedTags->links()}}
                @endif
            </table>
        </div>
    </div>
@endsection