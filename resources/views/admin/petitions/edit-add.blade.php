@extends("layouts.admin")
@section("title")
    Modificando {{$petition->title}}
@endsection
@section("content")
    <div class="content-wrapper">

        {{-- Título con un ligero margen y borde inferior para separación --}}
        <h2 class="mb-4 pb-2 border-bottom text-dark">Editar Petición: #{{ $petition->id }}</h2>

        <div class="card shadow-lg border-primary"> {{-- Sombra más fuerte y borde azul primario --}}
            <div class="card-body p-4"> {{-- Padding un poco mayor --}}

                {{-- Importante: El método y la ruta son correctos para una actualización (PUT) --}}
                <form action="{{ route('adminpetitions.update',["id"=>$petition->id]) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">Título</label>
                        <input type="text"
                               class="form-control form-control-lg border-secondary" {{-- Input más grande y borde sutil --}}
                               id="title"
                               name="title"
                               value="{{ old('title', $petition->title) }}" {{-- USAMOS old() y valor por defecto --}}
                        >
                        @error('title')
                        <div class="text-danger small mt-1">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">Descripción</label>
                        <textarea class="form-control border-secondary"
                                  id="description"
                                  name="description"
                                  rows="4"
                        >{{ old('description', $petition->description) }}</textarea> {{-- USAMOS old() y valor por defecto --}}
                        @error('description')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Destinatarios --}}
                    <div class="mb-3">
                        <label for="destinatary" class="form-label fw-bold">Destinatarios</label>
                        <input type="text"
                               class="form-control border-secondary"
                               id="destinatary"
                               name="destinatary"
                               value="{{ old('destinatary', $petition->destinatary) }}" {{-- Asumo que tienes 'destinatary' en $petition --}}
                        >
                        @error('destinatary')
                        <div class="text-danger small mt-1">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- Imagen/Archivo --}}
                    <div class="mb-3 p-3 border rounded bg-light"> {{-- Bloque de archivo destacado --}}
                        <label for="image" class="form-label fw-bold text-primary">Imagen de la Petición (Subir nuevo archivo)</label>
                        <input class="form-control"
                               type="file"
                               name="image"
                               id="image"
                               accept="image/png, image/jpeg, image/jpg,image/webp"
                        >
                        <div class="form-text mt-2">Imagen actual: **{{ $petition->file->file_path ?? 'No hay archivo' }}**</div>
                        @error('image')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Firmantes --}}
                    <div class="mb-3">
                        <label for="signers" class="form-label fw-bold">Firmantes (Valor Actual)</label>
                        <input type="number"
                               class="form-control border-warning" {{-- Borde amarillo para destacar que son datos numéricos --}}
                               id="signers"
                               name="signers"
                               value="{{ old('signers', $petition->signers) }}"
                               min="0"
                        >
                        <div class="form-text text-muted">Este campo representa la cantidad de firmas actuales y solo debería ser actualizado por el sistema.</div>
                        @error('signers')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Estado --}}
                    <div class="mb-4">
                        <label for="status" class="form-label fw-bold">Estado</label>
                        <select class="form-select border-secondary" id="status" name="status">
                            <option value="pending" {{ old('status', $petition->status) == 'pending' ? 'selected' : '' }}>Pendiente
                            </option>
                            <option value="accepted" {{ old('status', $petition->status) == 'accepted' ? 'selected' : '' }}>Aceptada
                            </option>
                        </select>
                        @error('status')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Categoría --}}
                    <div class="mb-4">
                        <label for="category" class="form-label fw-bold">Categoría</label>
                        <select class="form-select border-secondary" id="category" name="category">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{ old('category', $petition->category_id) == $category->id ? "selected" : "" }}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Botones --}}
                    <div class="pt-3 border-top d-flex justify-content-end"> {{-- Separador y alineación a la derecha --}}
                        <button type="submit" class="btn btn-success btn-lg shadow-sm me-2">
                            <i class="fas fa-save me-1"></i> Actualizar Petición
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
