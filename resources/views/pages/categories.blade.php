@extends('layouts.app')
@section('title')
    All Categories | {{$settings['site_name']}}
@endsection

@section('content')

    <div class="container">
        <main class="main">
            <div class="heading text-center">
                <h4 class="heading-title">ALL BLOG CATEGORIES</h4>
                <div class="heading-line">
                    <span class="short-line"></span>
                    <span class="long-line"></span>
                </div>
            </div>
            <div class="row">
                @foreach($categories as $category)
                    <div class="panel panel-default text-center" style="max-width: 200px; float: left; padding: 10px; margin: 10px">
                        <div class="panel-heading">
                            <h3 class="panel-title"><a href="{{route('category.posts',$category['id'])}}">{{$category['name']}}</a></h3>
                        </div>
                        <div class="panel-body">
                            {{count($category->posts)}} Posts
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="padded-50"></div>
        </main>
    </div>
@endsection