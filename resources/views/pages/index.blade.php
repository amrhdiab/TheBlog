@extends('layouts.app')
@section('title')
    Home | {{$settings['site_name']}}
@endsection
@section('content')

    <div class="container">

        {{-- Main Post Start --}}

        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                    <div class="post-thumb">
                        <img src="{{asset('/storage/uploads/posts/').'/'.$first_post['featured']}}"
                             alt="{{$first_post['title']}}">
                        <div class="overlay"></div>
                        <a href="{{asset('/storage/uploads/posts/').'/'.$first_post['featured']}}"
                           class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="{{route('single.post', $first_post['slug'])}}" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>

                    <div class="post__content">

                        <div class="post__content-info">

                            <h2 class="post__title entry-title text-center">
                                <a href="{{route('single.post', $first_post['slug'])}}">{{$first_post['title']}}</a>
                            </h2>

                            <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{$first_post['created_at']->toFormattedDateString()}}
                                            </time>

                                        </span>

                                <span class="category">
                                            <i class=" fa fa-list"></i>
                                            <a href="{{route('category.posts' , $first_post->category['id'])}}">{{$first_post->category['name']}}</a>
                                        </span>

                                <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                            </div>
                        </div>
                    </div>

                </article>
            </div>
            <div class="col-lg-2"></div>
        </div>

        {{-- / Main Post End --}}

        <div class="row">

            {{-- Second Post Start --}}

            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                    <div class="post-thumb">
                        <img src="{{asset('/storage/uploads/posts/').'/'.$second_post['featured']}}"
                             alt="{{$second_post['title']}}">
                        <div class="overlay"></div>
                        <a href="{{asset('/storage/uploads/posts/').'/'.$second_post['featured']}}"
                           class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="{{route('single.post', $second_post['slug'])}}" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>

                    <div class="post__content">

                        <div class="post__content-info">

                            <h2 class="post__title entry-title text-center">
                                <a href="{{route('single.post', $second_post['slug'])}}">{{$second_post['title']}}</a>
                            </h2>

                            <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{$second_post['created_at']->toFormattedDateString()}}
                                            </time>

                                        </span>

                                <span class="category">
                                            <i class="fa fa-list"></i>
                                            <a href="{{route('category.posts' , $second_post->category['id'])}}">{{$second_post->category['name']}}</a>
                                        </span>

                                <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                            </div>
                        </div>
                    </div>

                </article>
            </div>

            {{-- / Second Post End --}}

            {{-- Third Post Start --}}
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                    <div class="post-thumb">
                        <img src="{{asset('/storage/uploads/posts/').'/'.$third_post['featured']}}"
                             alt="{{$third_post['title']}}">
                        <div class="overlay"></div>
                        <a href="{{asset('/storage/uploads/posts/').'/'.$third_post['featured']}}"
                           class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="{{route('single.post', $third_post['slug'])}}" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>

                    <div class="post__content">

                        <div class="post__content-info">

                            <h2 class="post__title entry-title text-center">
                                <a href="{{route('single.post', $third_post['slug'])}}">{{$third_post['title']}}</a>
                            </h2>

                            <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{$third_post['created_at']->toFormattedDateString()}}
                                            </time>

                                        </span>

                                <span class="category">
                                            <i class="fa fa-list"></i>
                                            <a href="{{route('category.posts' , $third_post->category['id'])}}">{{$third_post->category['name']}}</a>
                                        </span>

                                <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                            </div>
                        </div>
                    </div>

                </article>
            </div>

            {{-- / Second Post End --}}

        </div>
    </div>

    {{-- Highlighted Categories Start --}}
    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                <div class="col-lg-12">
                    @foreach($categories as $category)
                        <div class="offers">
                            <div class="row">
                                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                    <div class="heading">
                                        <h4 class="h1 heading-title">{{$category['name']}}</h4>
                                        <div class="heading-line">
                                            <span class="short-line"></span>
                                            <span class="long-line"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="case-item-wrap">
                                    @foreach($category->posts()->orderBy('created_at','desc')->get() as $post)
                                        @if($loop->index < 3)
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="case-item">
                                                    <div class="case-item__thumb">
                                                        <img src="{{asset('/storage/uploads/posts/').'/'.$post['featured']}}"
                                                             alt="our case">
                                                    </div>
                                                    <h6 class="case-item__title"><a
                                                                href="{{route('single.post', $post['slug'])}}">{{$post['title']}}</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="padded-50"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- / Highlighted Categories End --}}

    <!-- Subscribe Form -->
    @include('inc.subscribe')
    <!-- End Subscribe Form -->
@endsection