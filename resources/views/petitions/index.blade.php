@extends("layouts.public")
@section("title")
    Todas Las Peticiones
@endsection
@section("content")
    <div class="container">
        <div class="my-5">
            <div class="d-flex flex-wrap gap-2">
                @foreach($categories as $category)
                    <a href="{{route("petitions.category",["id"=>$category->id])}}" class="btn btn-outline-primary">{{$category->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="my-5">
            <h3><strong>Peticiones patrocinadas por otros usuarios de Change.org</strong></h3>
            <div class="row g-4">
                @foreach($petitions as $petition)
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                        <div class="card w-100">
                            <a href="{{route("petitions.show",["id"=>$petition->id])}}"
                               class="text-decoration-none text-black">
                                <img
                                    src={{asset("assets/img/petitions/{$petition->file->file_path}")}} alt="{{$petition->file->name}}"
                                    class="card-img-top">
                                <div class="card-body">
                                    <p class="card-title">{{$petition->title}}</p>
                                    <p class="card-text"><strong>{{$petition->description}}</strong>.</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <img src={{asset("assets/img/pencil.png")}} alt="" style="width: 20px;">
                                        <p class="text-primary m-0 ms-2"><strong>{{$petition->signers}} firmas</strong>
                                        </p>
                                    </div>
                                    @if(Auth::check())
                                        @if(Auth::id()==$petition->user_id)
                                            <button type="submit" class="btn btn-outline-dark w-100 d-none">
                                                Firmar esta petición
                                            </button>
                                        @elseif($petition->userSigners->contains(Auth::id()))
                                            <form method="post"
                                                  action="{{route("petitions.firmar",["id"=>$petition->id])}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-dark w-100">
                                                    Des-firmar esta petición
                                                </button>
                                            </form>
                                        @else
                                            <form method="post"
                                                  action="{{route("petitions.firmar",["id"=>$petition->id])}}">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-dark w-100">
                                                    Firmar esta petición
                                                </button>
                                            </form>
                                        @endif
                                    @else
                                        <a href="<?php echo (route("login")); ?>" class="btn btn-outline-dark w-100">Firma
                                            esta petición</a>
                                    @endif
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
