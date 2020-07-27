@extends('admin.layouts.app')

@section('content')
    @component('admin.components.create')
        @slot('title', 'Criar Posts')
        @slot('url', route('posts.store'))
        @slot('form')
            @include('admin.posts.form')
        @endslot
    @endcomponent
@endsection