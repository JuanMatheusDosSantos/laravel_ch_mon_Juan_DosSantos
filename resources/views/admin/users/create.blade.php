@extends('layouts.admin')
@section("title")
    Registrar al usuario
@endsection
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow p-4">
                    <h2 class="text-center mb-4">Registro de Usuario</h2>

                    <form method="POST" action="{{ route('adminusers.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input id="name" type="text" name="name"
                                   class="form-control"
                                   required autofocus>
                            @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input id="email" type="email" name="email"
                                   class="form-control"
                                   required>
                            @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="role_id" class="form-label">Rol</label>
                            <select name="role_id" id="role_id" class="form-select" required>
                                <option value="" selected disabled>Selecciona un rol</option>
                                <option value="1">Administrador</option>
                                <option value="0">Usuario</option>
                            </select>
                            @error('role_id')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input id="password" type="password" name="password"
                                   class="form-control"
                                   required>
                            @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="d-flex align-items-center justify-content-between">

                            <button type="submit" class="btn btn-primary">
                                Registrarse
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
