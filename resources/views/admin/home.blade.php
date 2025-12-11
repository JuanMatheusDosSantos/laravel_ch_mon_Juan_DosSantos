@extends('layouts.admin') {{-- Asume que tu layout principal se llama admin.blade.php --}}

@section('title', 'Gestión de Peticiones')

@section('content')
    {{-- El main-content ya contiene la topbar en tu layout, aquí solo inyectamos el contenido --}}

    <div class="content-wrapper">

        <button class="btn btn-primary mb-3">Nueva Petición</button>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Id</th>
                                <th scope="col">Título</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Firmantes</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Bucle para iterar las peticiones (Ejemplo) --}}
                            @foreach($petitions as $petition)
                                <tr>
                                    <td>
                                        {{-- Reemplazar con la imagen real de la petición --}}
                                        <img src="{{asset("assets/img/petitions/{$petition->file->file_path}")}}"
                                             class="rounded-circle" alt="Imagen" style="width: 40px; height: 40px;">
                                    </td>
                                    <td>{{ $petition->id }}</td>
                                    <td>{{$petition->title}}</td>
                                    <td>{{$petition->description}}</td>
                                    <td>{{$petition->signers}}</td>

                                    <td>
                                    <span
                                        class="badge {{ $petition->status == 'accepted' ? 'bg-success' : 'bg-warning text-dark' }}">
                                        {{ $petition->status }}
                                    </span>
                                    </td>
                                    <td class="btn-action-group d-flex">
                                        <form action="{{route("adminpetitions.state",["id"=>$petition->id])}}" method="post" class="me-1">
                                            @csrf
                                            @method("put")
                                        <button type="submit" class="btn {{$petition->status=="accepted" ? "btn-danger":"btn-success"}} me-1" title="{{$petition->status=="accepted" ? "Denegar":"Aceptar"}}"><i
                                                class="fas {{$petition->status=="accepted"?"fa-times":"fa-check"}}"></i></button>
                                        </form>
                                        <a href="{{route("adminpetitions.show",["id"=>$petition->id])}}" class="btn btn-primary me-1" title="Ver"><i class="fas fa-eye"></i></a>
                                        <a href="#" class="btn btn-danger ms-1" title="Eliminar"><i class="fas fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <nav aria-label="Paginación de tabla" class="mt-3">
            <ul class="pagination pagination-sm justify-content-end">
                <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
        </nav>

    </div>
@endsection
