@extends('admin.layouts.app')

@section('content')
    @component('admin.components.show')
        @slot('title', 'Mostar Post')
        @slot('content')
            @include('admin.posts.form')
        @endslot
        @slot('back')
            <a href="{{ route('posts.index') }}" class="btn btn-dark">Voltar</a>
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Editar</a>
        @endslot
    @endcomponent
@endsection

@push('scripts')
    <script>
        $(".form-control").attr("disabled", true);
    </script>
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
@endpush