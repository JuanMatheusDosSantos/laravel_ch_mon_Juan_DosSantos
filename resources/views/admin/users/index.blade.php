@extends("layouts.admin")
@section("title")
    Gestion de Usuarios
@endsection
@section("content")
    <div class="content-wrapper">

        <a href="{{ route('adminusers.create') }}" class="btn btn-primary mb-3">Nuevo Usuario</a>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Registro</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge {{ $user->role_id ? 'bg-danger' : 'bg-secondary' }}">
                                            {{ $user->role_id ? 'Admin' : 'User' }}
                                        </span>
                                    </td>
                                    <td>{{$user->created_at}}</td>

                                    <td class="btn-action-group">
                                        <a href="{{ route('adminusers.edit', ["id"=>$user->id,"redirect"=>url()->current()]) }}"
                                           class="btn btn-primary me-1"
                                           title="Editar"><i class="fas fa-pen"></i></a>

                                        <a href="{{ route('adminusers.show', $user) }}"
                                           class="btn btn-info me-1"
                                           title="Ver"><i class="fas fa-eye"></i></a>

                                        <form action="{{ route('adminusers.delete', ["id"=>$user->id]) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de que quieres eliminar al usuario {{ $user->name }}?')">
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
            @if(isset($users) && $users instanceof \Illuminate\Contracts\Pagination\Paginator)
                {{ $users->links('pagination::bootstrap-5') }}
            @else
                <ul class="pagination pagination-sm justify-content-end">
                    <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            @endif
        </nav>

    </div>
@endsection
