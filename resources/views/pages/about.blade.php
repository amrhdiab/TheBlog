@extends('layouts.app')
@section('title')
    About Us | {{$settings['site_name']}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="info">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="heading text-center">
                        <h3 class="heading-title">About Us</h3>
                        <div class="heading-line">
                            <span class="short-line"></span>
                            <span class="long-line"></span>
                        </div>
                        <p class="heading-text">Qolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibham
                            liber tempor cum soluta nobis eleifend option congue nihil uarta decima et quinta.
                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                            ut aliquip ex ea commodo consequat eleifend option nihil. Investigationes demonstraverunt
                            lectores legere me lius quod ii legunt saepius parum claram.
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <div class="padded-50"></div>
    </div>
@endsection