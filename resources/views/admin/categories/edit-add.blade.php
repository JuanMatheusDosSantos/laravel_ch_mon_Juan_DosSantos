@extends("layouts.admin")
@section("title")
    Admin {{Auth::user()->name}}
@endsection
@section("content")
    <div class="content-wrapper">

        {{-- Título con un ligero margen y borde inferior para separación --}}
        <h2 class="mb-4 pb-2 border-bottom text-dark">Editar Petición: {{ $category->name }}</h2>

        <div class="card shadow-lg border-primary"> {{-- Sombra más fuerte y borde azul primario --}}
            <div class="card-body p-4"> {{-- Padding un poco mayor --}}

                {{-- Importante: El método y la ruta son correctos para una actualización (PUT) --}}
                <form action="{{ route('admincategories.update',["id"=>$category->id]) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Título</label>
                        <input type="text"
                               class="form-control form-control-lg border-secondary" {{-- Input más grande y borde sutil --}}
                               id="name"
                               name="name"
                               value="{{ old('name', $category->name) }}" {{-- USAMOS old() y valor por defecto --}}
                        >
                        @error('name')
                        <div class="text-danger small mt-1">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">Descripción</label>
                        <textarea class="form-control border-secondary"
                                  id="description"
                                  name="description"
                                  rows="4"
                        >{{ old('description', $category->description) }}</textarea> {{-- USAMOS old() y valor por defecto --}}
                        @error('description')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Botones --}}
                    <div class="pt-3 border-top d-flex justify-content-end"> {{-- Separador y alineación a la derecha --}}
                        <button type="submit" class="btn btn-success btn-lg shadow-sm me-2">
                            <i class="fas fa-save me-1"></i> Actualizar Categoria
                        </button>

                        <a href="{{ route('admin.home') }}" class="btn btn-secondary btn-lg">
                            <i class="fas fa-undo me-1"></i> Cancelar
                        </a>
                    </div>


                </form>

            </div>
        </div>

    </div>
@endsection
