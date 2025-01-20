@extends('master')

@section('contents')
    @guest
        @include('pages.home.partials.login_warning')
    @endguest
    @auth
        @include('pages.home.partials.create_post')
    @endauth
    @include('pages.home.partials.filter')
    @include('pages.home.partials.all_post')
@endsection
