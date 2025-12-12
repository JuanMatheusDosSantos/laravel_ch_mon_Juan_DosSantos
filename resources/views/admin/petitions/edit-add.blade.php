@extends("layouts.admin")
@section("title")
    Modificando {{$petition->title}}
@endsection
@section("content")
    <div class="content-wrapper">

        <h2 class="mb-4">Crear Nueva Petición</h2>

        <div class="card shadow-sm border-0">
            <div class="card-body">

                <form action="{{ route('adminpetitions.update',["id"=>$petition->id]) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Título</label>
                        <input type="text"
                               class="form-control"
                               id="title"
                               name="title"
{{--                               value="{{$petition->title}}"--}}
                        >
                        @error('title')
                        <div class="text-danger small mt-1">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- Campo: Descripción --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control"
                                  id="description"
                                  name="description"
                                  rows="4"
                                  ></textarea>
                        @error('description')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="destinatary" class="form-label">Destinatarios</label>
                        <input type="text"
                               class="form-control"
                               id="destinatary"
                               name="destinatary"
                            {{--                               value="{{$petition->title}}"--}}
                        >
                        @error('destinatary')
                        <div class="text-danger small mt-1">{{$message}}</div>
                        @enderror
                    </div>
                    {{-- Campo: Imagen/Archivo (Necesitas 'enctype="multipart/form-data"' en el form) --}}
                    <div class="mb-3">
                        <label for="image" class="form-label">Imagen de la Petición</label>
                        <input class="form-control"
                               type="file"
                               name="image"
                               id="image"
                               accept="image/png, image/jpeg, image/jpg,image/webp"
                        >
                        @error('image')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Campo: Firmantes (Inicialmente, este campo suele ser 0 al crear, pero lo incluimos por la tabla) --}}
                    <div class="mb-3">
                        <label for="signers" class="form-label">Firmantes (Valor Inicial)</label>
                        <input type="number"
                               class="form-control"
                               id="signers"
                               name="signers"
                               value="{{$petition->signers}}"
                               min="0"
                               >
                        <div class="form-text">Este es el número de firmantes inicial, usualmente 0.</div>
                        @error('signers')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Campo: Estado (Usando un select) --}}
                    <div class="mb-4">
                        <label for="status" class="form-label">Estado</label>
                        <select class="form-select" id="status" name="status">
                            <option value="pending" {{ $petition->status == 'pending' ? 'selected' : '' }}>Pendiente
                            </option>
                            <option value="accepted" {{ $petition->status == 'accepted' ? 'selected' : '' }}>Aceptada
                            </option>
                        </select>
                        @error('status')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="category" class="form-label">Estado</label>
                        <select class="form-select" id="category" name="category">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$category->id==$petition->category_id?"selected":""}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('status')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Botón de Enviar --}}
                    <button type="submit" class="btn btn-success btn-lg">Guardar Petición</button>

                    {{-- Botón de Cancelar --}}
                    <a href="{{ route('admin.home') }}" class="btn btn-secondary btn-lg ms-2">Cancelar</a>


                </form>

            </div>
        </div>

    </div>
@endsection
