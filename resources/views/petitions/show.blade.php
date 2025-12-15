@extends("layouts.public")
@section("title")
    {{$petition->title}}
@endsection
@section("content")
    <div class="container">
        <h1>{{$petition->title}}</h1>
        <div class="d-flex">
            <div class="col-9">
                <img src="{{asset("assets/img/petitions/{$petition->file->file_path}")}}" alt="" class="w-50">
                <div class=" mb-5">
                    <h2 class="col-10">El problema</h2>
                    <p>
                        {{$petition->description}}
                    </p>
                    <span><a href="" class="text-decoration-none text-black">Denunciar una violación de las
                            políticas</a></span>
                    <hr class="w-100">

                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="d-flex align-items-center mb-2 mb-md-0">
                            <img src={{asset("assets/img/avatar-sunshine.svg")}} alt="">
                            <div class="ms-3">
                                <h5>{{$petition->user->name}}</h5>
                                <p class="mb-0">Creador de la petición</p>
                            </div>
                        </div>

                        <div class="d-flex flex-column align-items-end justify-content-center">


                            <a href="" class="mb-2">
                                <button class="btn btn-outline-dark">Consultas de medios de
                                    comunicación
                                </button>
                            </a>
                            @if(Auth::check()&&Auth::id()==$petition->user_id)
                                <div class="btn-group mt-3" role="group">

                                    <a href="{{route('petitions.edit', ["id"=>$petition->id]) }}"
                                       class="btn btn-primary me-3 rounded" title="Editar Petición">
                                        <i class="fas fa-pen me-1"></i> Editar
                                    </a>
                                    <form action="{{route("petitions.delete",["id"=>$petition->id])}}" method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" title="Eliminar Petición"
                                                onclick="return confirm('¿Estás seguro de que quieres eliminar la petición: {{ $petition->title }}?')">
                                            <i class="fas fa-trash-alt me-1"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
            <div class="border shadow col-3 text-center h-100 p-2 sticky-top">
                <h3>
                    <strong>Firmas totales: {{$petition->signers}}</strong>
                </h3>
                @if(Auth::check())
                    @if(Auth::id()!=$petition->user_id&&!$petition->userSigners->contains(Auth::id()))
                        <hr>
                        <div class="text-start">
                            <h4><strong>Firma esta petición</strong></h4>
                            <form method="post" action="{{route("petitions.firmar",["id"=>$petition->id])}}" class="">
                                @csrf
                                <div class="d-flex align-items-start my-3">
                                    <input type="radio" name="opt" id="opt1" value="si">
                                    <label for="opt1">Quiero saber si esta petición gana y cómo puedo ayudar a otras
                                        peticiones
                                        ciudadanas</label>
                                </div>
                                <div class="d-flex align-items-start my-3">
                                    <input type="radio" name="opt" id="opt2" value="no" checked>
                                    <label for="opt2">No quiero saber cómo avanza esta petición ni otras peticiones
                                        importantes</label>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-warning d-flex align-items-center mt-2">

                                        <img src={{asset("assets/img/pencil.png")}} alt=""
                                             style="width: 20px; height: 20px;">
                                        <p class="my-auto">firma esta peticion</p>
                                        <div></div>
                                    </button>
                                </div>
                            </form>
                        </div>
                    @elseif($petition->userSigners->contains(Auth::id()))
                        <form method="post"
                              action="{{route("petitions.firmar",["id"=>$petition->id])}}">
                            @csrf
                            <button type="submit" class="btn btn-outline-dark w-100">
                                Des-firmar esta petición
                            </button>
                        </form>
                    @else
                        <div class="text-start">
                            <h4><strong>Firma esta petición</strong></h4>
                            <form method="post" action="{{route("petitions.firmar",["id"=>$petition->id])}}"
                                  class="d-none">
                                @csrf
                                <div class="d-flex align-items-start my-3">
                                    <input type="radio" name="opt" id="opt1" value="si">
                                    <label for="opt1">Quiero saber si esta petición gana y cómo puedo ayudar a otras
                                        peticiones
                                        ciudadanas</label>
                                </div>
                                <div class="d-flex align-items-start my-3">
                                    <input type="radio" name="opt" id="opt2" value="no" checked>
                                    <label for="opt2">No quiero saber cómo avanza esta petición ni otras peticiones
                                        importantes</label>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-warning d-flex align-items-center mt-2">

                                        <img src={{asset("assets/img/pencil.png")}} alt=""
                                             style="width: 20px; height: 20px;">
                                        <p class="my-auto">firma esta peticion</p>
                                        <div></div>
                                    </button>
                                </div>
                            </form>
                        </div>

                    @endif
                @else
                    <hr>
                    <div class="text-start">
                        <h4><strong>Firma esta petición</strong></h4>
                        <form action="{{route("login")}}" method="get" class="  ">
                            @csrf
                            <div class="d-flex align-items-start my-3">
                                <input type="radio" name="opt" id="opt1" value="si">
                                <label for="opt1">Quiero saber si esta petición gana y cómo puedo ayudar a otras
                                    peticiones
                                    ciudadanas</label>
                            </div>
                            <div class="d-flex align-items-start my-3">
                                <input type="radio" name="opt" id="opt2" value="no" checked>
                                <label for="opt2">No quiero saber cómo avanza esta petición ni otras peticiones
                                    importantes</label>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-warning d-flex align-items-center mt-2">
                                    <img src={{asset("assets/img/pencil.png")}} alt=""
                                         style="width: 20px; height: 20px;">
                                    <p class="my-auto">firma esta peticion</p>
                                </button>
                            </div>
                        </form>
                        @endif
                    </div>
            </div>
        </div>

@endsection
