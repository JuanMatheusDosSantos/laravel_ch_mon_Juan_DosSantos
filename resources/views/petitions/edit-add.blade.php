@extends("layouts.public")
@section("title")
    Crear peticion
@endsection
@section("content")
<div class="text-center">
    <h1>Demos el primer paso hacia el cambio</h1>
    <div class="container d-flex justify-content-center">
        <form action="{{route("petitions.store")}}" enctype="multipart/form-data" method="post" class="w-50 border shadow p-5" >
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
            <label for="title" class="form-label">Escribe el título de tu petición</label>
            <input type="text" class="form-control mb-3" id="title" name="title" required>
            <select name="category" id="category" class="form-select mb-3" required>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <label for="description" class="form-range">Cuenta tu historia</label>
            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
            <label for="destinatary" class="form-label">¿A quien va dirigido?</label>
            <input type="text" class="form-control mb-3" id="destinatary" name="destinatary" required>
            <label for="image" class="form-label">Añade una imagen</label>
            <input type="file" name="image" id="image" accept="image/png, image/jpeg, image/jpg,image/webp" class="form-control mb-3" required>
            <button type="submit" class="btn btn-outline-primary">Crear petición</button>
        </form>
    </div>
</div>
@endsection
