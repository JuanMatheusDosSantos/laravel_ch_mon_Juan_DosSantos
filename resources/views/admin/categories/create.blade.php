@extends('layouts.admin') {{-- Asume que tu layout principal se llama admin.blade.php --}}

@section('title', 'Crear nueva categoria')

@section('content')
    <div class="text-center">
        <h1>Crear Nueva Categoría</h1>
        <div class="container d-flex justify-content-center">
            <form action="{{route("admincategories.store")}}" method="post" class="w-50 border shadow p-5" >
                @csrf

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <label for="name" class="form-label">Nombre de la Categoría</label>
                <input type="text"
                       class="form-control mb-3"
                       id="name"
                       name="name"
                       required>

                <label for="description" class="form-label">Descripción (Opcional)</label>
                <textarea name="description"
                          id="description"
                          class="form-control mb-4"
                          rows="3"></textarea>

                <button type="submit" class="btn btn-primary btn-lg">Crear Categoría</button>
            </form>
        </div>
    </div>
@endsection
