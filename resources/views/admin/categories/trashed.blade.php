@extends('admin.layouts.app')
@section('title','Trashed Categories')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Trashed Categories
            <a href="{{route('category.index')}}" class="btn btn-sm btn-default pull-right">
                <i class="fa fa-backward"></i> Back
            </a>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Restore</th>
                    <th>Delete Permanently</th>
                </tr>
                </thead>
                @if(count($categories) > 0)
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category['name']}}</td>
                            <td>
                                <form action="{{route('category.restore',$category['id'])}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('PATCH')}}
                                    <button type="submit" name="submit" class="btn btn-xs btn-primary">
                                        <i class="fa fa-undo-alt"></i> Restore
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('category.delete.trashed',$category['id'])}}" method="post">
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
                            No trashed categories found.
                        </td>
                    </tr>
                    {{$categories->links()}}
                @endif
            </table>
        </div>
    </div>
@endsection