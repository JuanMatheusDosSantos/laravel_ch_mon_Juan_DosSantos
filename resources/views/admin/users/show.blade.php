@extends("layouts.admin")
@section("title")
    Admin {{Auth::user()->name}}
@endsection
@section("content")
    <div class="container my-4">

        <h1 class="mb-4">Perfil de Usuario: {{ $user->name }}</h1>

        <div class="d-flex flex-wrap">

            <div class="col-12 col-md-9 pe-md-4">

                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            {{--                            <img src="{{ asset('assets/img/avatar-sunshine.svg') }}" alt="Avatar" class="rounded-circle me-3" style="width: 70px; height: 70px;">--}}
                            <div>
                                <h2 class="card-title mb-0">{{ $user->name }}</h2>
                                <p class="text-muted mb-0">{{ $user->email }}</p>
                                <span class="badge {{ $user->role_id == 1 ? 'bg-danger' : 'bg-secondary' }}">
                                    {{ $user->role_id == 1 ? 'Administrador' : 'Usuario Estándar' }}
                                </span>
                            </div>
                        </div>

                        <hr>

                        <dl class="row mb-0">
                            <dt class="col-sm-3 fw-bold">ID:</dt>
                            <dd class="col-sm-9">{{ $user->id }}</dd>

                            <dt class="col-sm-3 fw-bold">Registro:</dt>
                            <dd class="col-sm-9">{{ $user->created_at->format('Y-m-d') }}</dd>

                            <dt class="col-sm-3 fw-bold">Última Actualización:</dt>
                            <dd class="col-sm-9">{{ $user->updated_at->format('Y-m-d H:i') }}</dd>
                        </dl>

                    </div>
                </div>

                <div class="mb-5">
                    <h3 class="mb-3 border-bottom pb-2">Peticiones Creadas ({{ $user->petitions->count() ?? 0 }})</h3>

                    @forelse($user->petitions as $petition)
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{ $petition->title }}</h5>
                                <p class="card-text text-truncate">{{ $petition->description }}</p>
                                <div class="d-flex justify-content-between align-items-center small text-muted">
                                    <span>Firmantes: {{ $petition->signers }}</span>
                                    <span>Estado: <span
                                            class="badge {{ $petition->status == 'accepted' ? 'bg-success' : 'bg-warning text-dark' }}">{{ ucfirst($petition->status) }}</span></span>
                                    <a href="{{ route('adminpetitions.show', $petition->id) }}"
                                       class="btn btn-sm btn-outline-info">Ver Petición</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-info">Este usuario no ha creado ninguna petición aún.</div>
                    @endforelse
                </div>

            </div>

            <div class="col-12 col-md-3">
                <div class="border shadow p-3 sticky-top" style="top: 20px;">

                    <h4 class="mb-3 text-center">Acciones y Resumen</h4>
                    <hr>

                    <div class="d-grid gap-2 mb-4">
                        <a href="{{ route('adminusers.edit', ["id"=>$user->id,"redirect"=>url()->current()]) }}"
                           class="btn btn-primary">
                            <i class="fas fa-edit me-1"></i> Editar Usuario
                        </a>

                        <form action="{{ route('adminusers.delete', ["id"=>$user->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger w-100"
                                    onclick="return confirm('¿Estás seguro de que quieres eliminar al usuario {{ $user->name }}?')">
                                <i class="fas fa-trash-alt me-1"></i> Eliminar Usuario
                            </button>
                        </form>
                    </div>

                    <h5 class="mt-3 border-bottom pb-1">Resumen</h5>
                    <ul class="list-unstyled small">
                        <li>Peticiones Creadas: {{ $user->petitions->count() ?? 0 }}</li>
                        <li>Peticiones Firmadas: {{ $user->signedPetitions->count() ?? 0 }}</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection
