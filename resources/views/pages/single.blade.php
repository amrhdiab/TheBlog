@extends('layouts.app')
@section('title')
    {{$post['title']}} | {{$settings['site_name']}}
@endsection

@section('content')

    <!-- Stunning Header -->

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">{{$post['title']}}</h1>
        </div>
    </div>

    <!-- End Stunning Header -->

    <!-- Post Details -->


    <div class="container">
        <div class="row medium-padding120">
            <main class="main">
                <div class="col-lg-10 col-lg-offset-1">
                    <article class="hentry post post-standard-details">

                        <div class="post-thumb">
                            <img src="{{asset('/storage/uploads/posts/').'/'.$post['featured']}}"
                                 alt="{{$post['title']}}">
                        </div>

                        <div class="post__content">


                            <div class="post-additional-info">

                                <div class="post__author author vcard">
                                    Posted by

                                    <div class="post__author-name fn">
                                        <a href="#" class="post__author-link">{{$post->user['name']}}</a>
                                    </div>

                                </div>

                                <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-03-20 12:00:00">
                                    {{$post['created_at']->toFormattedDateString()}}
                                </time>

                            </span>

                                <span class="category">
                                <i class="fa fa-list"></i>
                                <a href="{{route('category.posts',$post->category['id'])}}">{{$post->category['name']}}</a>
                            </span>

                            </div>

                            <div class="post__content-info">

                                {!! $post['content'] !!}

                                <div class="widget w-tags">
                                    <div class="tags-wrap">
                                        @foreach($post->tags()->orderBy('created_at','desc')->get() as $tag)
                                            <a href="{{route('tag.posts' , $tag['id'])}}" class="w-tags-item">{{$tag['tag']}}</a>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="socials text-center">Share Post:
                            <br><br>
                            <div class="addthis_inline_share_toolbox"></div>
                        </div>

                    </article>

                    <div class="blog-details-author">

                        <div class="blog-details-author-thumb">
                            <img src="{{asset('/storage/uploads/avatars')}}/{{$post->user->profile['avatar']}}"
                                 style="max-width: 90px; max-height: 90px;" alt="{{$post->user['name']}}">
                        </div>

                        <div class="blog-details-author-content">
                            <div class="author-info">
                                <h5 class="author-name">{{$post->user['name']}}</h5>
                                <p class="author-info">@if($post->user['admin'])Admin @else Author @endif</p>
                            </div>
                            <p class="text"> {!! $post->user->profile['bio'] !!} </p>
                            <div class="socials">

                                <a href="{{$post->user->profile['facebook']}}" class="social__item">
                                    <img src="{{asset('app/svg/circle-facebook.svg')}}" alt="facebook">
                                </a>

                                <a href="{{$post->user->profile['youtube']}}" class="social__item">
                                    <img src="{{asset('app/svg/youtube.svg')}}" alt="youtube">
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="pagination-arrow">
                        @if($prevPost != null)
                            <a href="{{route('single.post', $prevPost['slug'])}}" class="btn-prev-wrap">
                                <svg class="btn-prev">
                                    <use xlink:href="#arrow-left"></use>
                                </svg>
                                <div class="btn-content">
                                    <div class="btn-content-title">Previous Post</div>
                                    <p class="btn-content-subtitle">{{$prevPost['title']}}</p>
                                </div>
                            </a>
                        @endif

                        @if($nextPost != null)
                            <a href="{{route('single.post', $nextPost['slug'])}}" class="btn-next-wrap">
                                <div class="btn-content">
                                    <div class="btn-content-title">Next Post</div>
                                    <p class="btn-content-subtitle">{{$nextPost['title']}}</p>
                                </div>
                                <svg class="btn-next">
                                    <use xlink:href="#arrow-right"></use>
                                </svg>
                            </a>
                        @endif
                    </div>

                    <div class="comments">

                        <div class="heading text-center">
                            <h4 class="h1 heading-title">Comments</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>
                        @include('inc.disqus')
                    </div>
                    <div class="padded-50"></div>
                    <div class="row">
                    </div>
                </div>

                <!-- End Post Details -->

                <!-- Sidebar-->

                <div class="col-lg-12">
                    <aside aria-label="sidebar" class="sidebar sidebar-right">
                        <div class="widget w-tags">
                            <div class="heading text-center">
                                <h4 class="heading-title">ALL BLOG TAGS</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>

                            <div class="tags-wrap">
                                @foreach($tags as $tag)
                                    <a href="{{route('tag.posts' , $tag['id'])}}" class="w-tags-item">{{$tag['tag']}}</a>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                </div>
            </main>
            <!-- End Sidebar-->
        </div>
    </div>
@endsection