@extends("layouts.admin")
@section("title")
    Admin {{Auth::user()->name}}
@endsection
@section("content")
    <div class="content-wrapper">

        <h2 class="mb-4 pb-2 border-bottom text-dark">Editar Usuario: {{ $user->name }}</h2>

        <div class="card shadow-lg border-primary">
            <div class="card-body p-4">

                <form action="{{ route('adminusers.update',["id"=>$user->id]) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Nombre</label>
                        <input type="text"
                               class="form-control form-control-lg border-secondary"
                               id="name"
                               name="name"
                               value="{{ old('name', $user->name) }}"
                        >
                        @error('name')
                        <div class="text-danger small mt-1">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">email</label>
                        <input type="text" class="form-control border-secondary"
                               id="email"
                               name="email"
                               value="{{ old('email', $user->email) }}"
                        >
                        @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="rol_id" class="form-label fw-bold">Rol</label>
                        <select id="rol_id" class="form-control border-secondary">
                            <option value="true">Admin</option>
                            <option value="false">Usuario</option>
                        </select>
                        @error('rol_id')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="pt-3 border-top d-flex justify-content-end">
                        <button type="submit" class="btn btn-success btn-lg shadow-sm me-2">
                            <i class="fas fa-save me-1"></i> Actualizar Categoria
                        </button>

                        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-lg">
                            <i class="fas fa-undo me-1"></i> Cancelar
                        </a>
                    </div>


                </form>

            </div>
        </div>

    </div>
@endsection
