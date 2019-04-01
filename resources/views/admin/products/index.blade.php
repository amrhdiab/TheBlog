@extends('admin.layouts.app')
@section('title','Products')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Products
            <div class="pull-right">
                <a href="{{route('product.create')}}">Create new product</a>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Trash</th>
                </tr>
                </thead>
                @if(count($products) > 0)
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product['name']}}</td>
                            <td>{{$product['price']}}</td>
                            <td><a href="#" class="btn btn-xs btn-default">View</a></td>
                            <td><a href="{{route('product.edit', $product['id'])}}" class="btn btn-xs btn-info"><i
                                            class="fa fa-pencil-alt"></i> Edit</a></td>
                            <td>
                                <form action="{{route('product.destroy',$product['id'])}}" method="post">
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
                            No Products found.
                        </td>
                    </tr>
                @endif
            </table>
            {{$products->links()}}
        </div>
    </div>
@endsection