@extends('admin.layouts.app')
@section('title','Categories')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Categories
            <div class="pull-right">
                <a href="{{route('category.create')}}">Create new category</a>  |
                <a href="{{route('category.trashed')}}">Trashed categories</a>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Trash</th>
                </tr>
                </thead>
                @if(count($categories) > 0)
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category['name']}}</td>
                            <td><a href="{{route('category.edit', $category['id'])}}" class="btn btn-xs btn-info"><i
                                            class="fa fa-pencil-alt"></i> Edit</a></td>
                            <td>
                                <form action="{{route('category.destroy',$category['id'])}}" method="post">
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
                            No categories found.
                        </td>
                    </tr>
                @endif
            </table>
            {{$categories->links()}}
        </div>
    </div>
@endsection