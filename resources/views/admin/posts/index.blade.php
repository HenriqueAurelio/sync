@extends('admin.layouts.app')

@section('content')
    @component('admin.components.table')
        @slot('titulo', 'Crud de Posts')
        @slot('create', route('posts.create'))
        @slot('head')
            <th>Nome</th>
            <th>Categoria</th>
            <th>Ações</th>
        @endslot
        @slot('body')
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->name }}</td>
                    @foreach($categories as $category)
                        @if($category->id == $post->category_id)
                            <td>{{ $category->name }}</td> 
                        @endif
                    @endforeach
                    @foreach($post->categories as $post)     
                        <td>{{ $post->pivot->category_id }}</td>        
                    @endforeach
                    <td>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success">Ver</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post" class="form-delete">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent
@endsection
@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
@endpush