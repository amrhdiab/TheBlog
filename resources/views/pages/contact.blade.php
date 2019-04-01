@extends('layouts.app')
@section('title')
    Contact Us | {{$settings['site_name']}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="info">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="heading text-center">
                        <h3 class="heading-title">Contact Us</h3>
                        <div class="heading-line">
                            <span class="short-line"></span>
                            <span class="long-line"></span>
                        </div>
                        <br><br>
                        @include('inc.flash')
                        <form action="{{route('send.message')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter your name.">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Enter your email.">
                            </div>
                            <div class="form-group">
                                <label for="title">Message Title:</label>
                                <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="Enter message title.">
                            </div>
                            <div class="form-group">
                                <label for="content">Message Body:</label>
                                <textarea name="content"  cols="30" rows="10" class="form-control" placeholder="Enter the content of your message.">{{old('content')}}</textarea>
                            </div>
                            <input type="submit" name="submit" value="Submit Message">
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="padded-50"></div>
    </div>
@endsection