@extends("layouts.admin")
@section("title")
    Gestion de Categorias
@endsection
@section("content")
    <div class="content-wrapper">

        {{-- Botón para crear una nueva categoría --}}
        <a href="{{ route('admincategories.create') }}" class="btn btn-primary mb-3">Nueva Categoria</a>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Peticiones</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ Str::limit($category->description, 50) }}</td>

                                    <td>
                                        {{ $category->petitions_count ?? ($category->petitions->count() ?? '0') }}
                                    </td>

                                    <td class="btn-action-group">
                                        <a href="{{ route('admincategories.edit', ["id"=>$category->id]) }}"
                                           class="btn btn-primary me-1"
                                           title="Editar"><i class="fas fa-pen"></i></a>
                                        <a href="{{route('admincategories.show', ["id"=>$category->id]) }}"
                                           class="btn btn-info me-1"
                                           title="Ver"><i class="fas fa-eye"></i></a>
                                        <form action="{{ route('admincategories.delete', ["id"=>$category->id]) }}"
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger" title="Eliminar"
                                                    onclick="return confirm('¿Estás seguro de que quieres eliminar esta categoría?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <nav aria-label="Paginación de tabla" class="mt-3">
            @if($count>10)
                {{ $categories->links() }}
            @endif
        </nav>

    </div>
@endsection
