<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'The Blog') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
    <!-- Toastr -->
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet"/>
</head>
<body>
<div id="app">
    @include('admin.inc.navbar')
    <div class="container">
        @auth
        <div class="row">
            <div class="col-lg-4">

                @include('admin.inc.sidebar')

            </div>
            <div class="col-lg-8">
                @include('admin.inc.flash')
                @yield('content')
            </div>
        </div>
        @else
            @yield('content')
            @endauth
    </div>

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>
<script>
    @if(session('success'))
    toastr.success('{{session('success')}}', 'Success', {timeOut: 1500});
    @endif

    @if(session('error'))
    toastr.error('{{session('error')}}', 'Error', {timeOut: 1500});
    @endif

    @if(session('info'))
    toastr.info('{{session('info')}}', 'Info', {timeOut: 2000});
    @endif
</script>

{{--CK Editor--}}
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>

</body>
</html>
