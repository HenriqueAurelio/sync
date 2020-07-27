@extends('admin.layouts.app')

@section('content')
    @component('admin.components.table')
        @slot('titulo', 'Crud de Categorias')
        @slot('create', route('categories.create'))
        @slot('head')
            <th>Nome</th>
            <th>Ações</th>
        @endslot
        @slot('body')
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="post" class="form-delete">
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