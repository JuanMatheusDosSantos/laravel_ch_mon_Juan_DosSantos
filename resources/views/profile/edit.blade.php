@extends("layouts.public")
@section("title")
    Perfil
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <div class="card shadow-sm mb-4 mt-5">
                <div class="card-body p-4 p-md-5">

                    <section>
                        <header class="mb-4">
                            <h2 class="h5 text-dark">Información del perfil</h2>
                            <p class="mt-1 text-muted small">
                                Actualiza la información de perfil y la dirección de correo electrónico de tu cuenta.
                            </p>
                        </header>

                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>

                        <form method="post" action="{{ route('profile.update') }}" class="mt-4">
                            @csrf
                            @method('patch')

                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input id="name" name="name" type="text" class="form-control"
                                       value="{{ old('name', $user->name) }}" required autofocus autocomplete="name"/>
                                @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input id="email" name="email" type="email" class="form-control"
                                       value="{{ old('email', $user->email) }}" required autocomplete="username"/>
                                @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror

                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                    <div class="mt-2">
                                        <p class="small text-muted mb-1">
                                            Tu dirección de correo electrónico no está verificada.
                                            <button form="send-verification"
                                                    class="btn btn-link btn-sm p-0 align-baseline text-decoration-underline">
                                                Haz clic aquí para reenviar el correo de verificación.
                                            </button>
                                        </p>

                                        @if (session('status') === 'verification-link-sent')
                                            <div class="alert alert-success mt-2 small p-2" role="alert">
                                                Se ha enviado un nuevo enlace de verificación a tu correo.
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <div class="d-flex align-items-center gap-3 mt-4">
                                <button type="submit" class="btn btn-dark">Guardar</button>
                                @if (session('status') === 'profile-updated')
                                    <p class="text-muted small" x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show" x-transition>
                                        Guardado.
                                    </p>
                                @endif
                            </div>

                        </form>
                    </section>

                </div>
            </div>
            <div class="card shadow-sm mb-4">
                <div class="card-body p-4 p-md-5">

                    <section>
                        <header class="mb-4">
                            <h2 class="h5 text-dark">Actualizar Contraseña</h2>
                            <p class="mt-1 text-muted small">
                                Usa una contraseña larga y aleatoria para mantener tu cuenta segura.
                            </p>
                        </header>

                        <form method="post" action="{{ route('password.update') }}" class="mt-4">
                            @csrf
                            @method('put')

                            <div class="mb-3">
                                <label class="form-label">Contraseña Actual</label>
                                <input name="current_password" type="password" class="form-control" autocomplete="current-password"/>
                                @error('current_password', 'updatePassword')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nueva Contraseña</label>
                                <input name="password" type="password" class="form-control" autocomplete="new-password"/>
                                @error('password', 'updatePassword')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Confirmar Contraseña</label>
                                <input name="password_confirmation" type="password" class="form-control" autocomplete="new-password"/>
                                @error('password_confirmation', 'updatePassword')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex align-items-center gap-3 mt-4">
                                <button type="submit" class="btn btn-dark">Guardar</button>
                                @if (session('status') === 'password-updated')
                                    <p class="text-muted small" x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show" x-transition>
                                        Guardado.
                                    </p>
                                @endif
                            </div>
                        </form>
                    </section>

                </div>
            </div>
            <div class="card shadow-sm mb-4">
                <div class="card-body p-4 p-md-5">

                    <section>
                        <header class="mb-4">
                            <h2 class="h5 text-dark">Eliminar Cuenta</h2>
                            <p class="mt-1 text-muted small">
                                Una vez que se elimine tu cuenta, todos sus datos serán eliminados permanentemente.
                            </p>
                        </header>

                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#confirm-user-deletion">
                            Eliminar Cuenta
                        </button>

                        {{-- MODAL --}}
                        <div class="modal fade" id="confirm-user-deletion" tabindex="-1"
                             aria-labelledby="confirmUserDeletionLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" action="{{ route('profile.destroy') }}">
                                        @csrf
                                        @method('delete')

                                        <div class="modal-header">
                                            <h2 class="modal-title h5" id="confirmUserDeletionLabel">
                                                ¿Estás seguro de que quieres eliminar tu cuenta?
                                            </h2>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <p class="text-muted small">
                                                Introduce tu contraseña para confirmar la eliminación.
                                            </p>

                                            <div class="mt-3">
                                                <input
                                                    id="password"
                                                    name="password"
                                                    type="password"
                                                    class="form-control @error('password', 'userDeletion') is-invalid @enderror"
                                                    placeholder="Contraseña"
                                                />

                                                @error('password', 'userDeletion')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="modal-footer d-flex justify-content-end">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Cancelar
                                            </button>
                                            <button type="submit" class="btn btn-danger ms-2">
                                                Eliminar Cuenta
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </section>

                </div>
            </div>
        </div>
    </div>
    @if ($errors->userDeletion->isNotEmpty())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var modal = new bootstrap.Modal(document.getElementById('confirm-user-deletion'));
                modal.show();
            });
        </script>
    @endif
@endsection
