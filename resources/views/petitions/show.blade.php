@extends("layouts.public")
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
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <img src={{asset("assets/img/avatar-sunshine.svg")}} alt="">
                            <div class="">
                                <h5>{{$petition->user->name}}</h5>
                                <p class="mb-0">Creador de la petición</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="">
                                <button class="btn btn-outline-dark">Consultas de medios de
                                    comunicación
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <hr class="my-5">
                <div>
                    <h2>Opiniones de firmantes</h2>
                    Comentarios destacados
                    <div class="my-3 border">
                        <div class=" m-3">
                            <div class="d-flex align-items-center">
                                <img src={{asset("assets/img/default-avatar-gray-128.svg")}} alt=""
                                     style="width: 60px;">
                                <div class="">
                                    <h5>
                                        Victoria, Las Palmas de Gran Canaria
                                    </h5>
                                    <p class="mb-0">hace 2 meses</p>
                                </div>

                            </div>
                            <div class="mt-2">
                                <p>"Yo sufrí violencia por mi pareja varios años hasta un día que los vecinos llamaron a
                                    la
                                    policía vino GC Y LOCAL entraron en la casa y yo estaba fuera porque no me dejaba
                                    las
                                    llaves de mi coche me arrastro por los pelos para entrarme como yo chillé y vio a la
                                    policía me dejó sentada y yo del shock me quedé ahí en la acera,orden de alejamiento
                                    que
                                    se..."
                                </p>
                                <a href="" class="text-dark"><strong>Ver el texto completo</strong></a>
                            </div>
                            <div class="d-flex mt-5">
                                <div class="me-3 d-flex justify-content-center align-content-center flex-wrap">
                                    <img src={{asset("assets/img/heart.svg")}} alt=""
                                         style="width: 20px; height: 20px;">
                                    <p class="mb-0">8 me gusta</p>
                                </div>
                                <div class="me-3 d-flex justify-content-center align-content-center flex-wrap">
                                    <img src={{asset("assets/img/flag.svg")}} alt="">
                                    <p class="mb-0">Denunciar</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-3 border">
                        <div class=" m-3">
                            <div class="d-flex align-items-center">
                                <img src={{asset("assets/img/default-avatar-gray-128.svg")}} alt=""
                                     style="width: 60px;">
                                <div class="">
                                    <h5>
                                        Cristina, Madrid
                                    </h5>
                                    <p class="mb-0">hace 2 meses</p>
                                </div>

                            </div>
                            <div class="mt-2">
                                <p>"Me ha ATERRADO leer este testimonio… Y luego dicen que las mujeres “nos lo
                                    inventamos” y
                                    que “queremos beneficios”. La violencia machista EXISTE y mando ánimos a la autora
                                    de
                                    esta petición y a las innumerables víctimas que también sufren en silencio!! Alcemos
                                    la
                                    voz por seguir enfatizando que NECESITAMOS FEMINISMO, no por la borda todo lo
                                    trabaja..."
                                </p>
                                <a href="" class="text-dark"><strong>Ver el texto completo</strong></a>
                            </div>
                            <div class="d-flex mt-5">
                                <div class="me-3 d-flex justify-content-center align-content-center flex-wrap">
                                    <img src={{asset("assets/img/heart.svg")}} alt=""
                                         style="width: 20px; height: 20px;">
                                    <p class="mb-0">5 me gusta</p>
                                </div>
                                <div class="me-3 d-flex justify-content-center align-content-center flex-wrap">
                                    <img src={{asset("assets/img/flag.svg")}} alt="">
                                    <p class="mb-0">Denunciar</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-3 border">
                        <div class=" m-3">
                            <div class="d-flex align-items-center">
                                <img src={{asset("assets/img/default-avatar-gray-128.svg")}} alt=""
                                     style="width: 60px;">
                                <div class="">
                                    <h5>
                                        Victoria, Las Palmas de Gran Canaria
                                    </h5>
                                    <p class="mb-0">hace 2 meses</p>
                                </div>

                            </div>
                            <div class="mt-2">
                                <p>"Yo también soy mujer de violencia de género."
                                </p>
                            </div>
                            <div class="d-flex mt-5">
                                <div class="me-3 d-flex justify-content-center align-content-center flex-wrap">
                                    <img src={{asset("assets/img/heart.svg")}} alt=""
                                         style="width: 20px; height: 20px;">
                                    <p class="mb-0">2 me gusta</p>
                                </div>
                                <div class="me-3 d-flex justify-content-center align-content-center flex-wrap">
                                    <img src={{asset("assets/img/flag.svg")}} alt="">
                                    <p class="mb-0">Denunciar</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--            @if(Auth::id()!==$petition->user_id)--}}
            <div class="border shadow col-3 text-center h-100 p-2 sticky-top">
                <h3>
                    <strong>Firmas totales: {{$petition->signers}}</strong>
                </h3>
                @if(Auth::check())
                    @if(!Auth::id()==$petition->user_id||!$petition->userSigners->contains(Auth::id()))
                        <hr>
                        <div class="text-start">
                            <h4><strong>Firma esta petición</strong></h4>
                            <form action="get" class="">
                                <div class="d-flex align-items-start my-3">
                                    <input type="radio" name="opt" id="opt1">
                                    <label for="opt1">Quiero saber si esta petición gana y cómo puedo ayudar a otras
                                        peticiones
                                        ciudadanas</label>
                                </div>
                                <div class="d-flex align-items-start my-3">
                                    <input type="radio" name="opt" id="opt2">
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
                                {{--                            <div class="d-flex align-items-start mt-2">--}}
                                {{--                                <input type="checkbox" name="privacidad" id="privacidad"> <label for="privacidad">No--}}
                                {{--                                    mostrar--}}
                                {{--                                    públicamente mi firma y mi comentario en esta petición</label>--}}
                                {{--                            </div>--}}
                            </form>
                            {{--                                @endif--}}
                        </div>
                    @endif
                @else
                <hr>
                <div class="text-start">
                    <h4><strong>Firma esta petición</strong></h4>
                    <form action="{{route("petitions.firmar",["id"=>$petition->id])}}" method="post" class="">
                        <div class="d-flex align-items-start my-3">
                            <input type="radio" name="opt" id="opt1">
                            <label for="opt1">Quiero saber si esta petición gana y cómo puedo ayudar a otras
                                peticiones
                                ciudadanas</label>
                        </div>
                        <div class="d-flex align-items-start my-3">
                            <input type="radio" name="opt" id="opt2">
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
                        {{--                            <div class="d-flex align-items-start mt-2">--}}
                        {{--                                <input type="checkbox" name="privacidad" id="privacidad"> <label for="privacidad">No--}}
                        {{--                                    mostrar--}}
                        {{--                                    públicamente mi firma y mi comentario en esta petición</label>--}}
                        {{--                            </div>--}}
                    </form>

                @endif
            </div>
        </div>
    </div>
@endsection
