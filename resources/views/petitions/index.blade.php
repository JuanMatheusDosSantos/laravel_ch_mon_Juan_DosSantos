@extends("layouts.public");
@section("content")
    <div class="container">
{{--        <div class="text-center">--}}
{{--            <h1><strong>Descubre tu próxima causa</strong></h1>--}}
{{--            <h3>Explora millones de peticiones y encuentra las que te interesan</h3>--}}
{{--            <div>--}}
{{--                <search>--}}
{{--                    <form action="">--}}
{{--                        <input type="text" name="" id="" class="rounded w-25" placeholder="Buscar peticiones">--}}
{{--                        <button type="submit" class="btn btn-warning"><strong>Buscar</strong></button>--}}
{{--                    </form>--}}
{{--                </search>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <h3><strong>Explorar</strong></h3>--}}
{{--            <div class="d-md-flex justify-content-center d-block text-center">--}}
{{--                <div class="me-3 border shadow col-4 text-center pt-3">--}}
{{--                    <img src={{asset("assets/img/map.svg")}} alt="" class="w-25">--}}
{{--                    <p>Cerca de ti</p>--}}
{{--                </div>--}}
{{--                <div class="me-3 border shadow col-4 text-center pt-3">--}}
{{--                    <img src={{asset("assets/img/graph-up-arrow.svg")}} alt="" class="w-25">--}}
{{--                    <p>Populares</p>--}}
{{--                </div>--}}
{{--                <div class="me-3 border shadow col-4 text-center pt-3">--}}
{{--                    <img src={{asset("assets/img/flag.svg")}} alt="" class="w-25">--}}
{{--                    <p>Victorias</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="my-5">
            <div class="d-flex flex-wrap gap-2">

                <a href="#" class="btn btn-outline-primary">Políticas Públicas</a>
                <a href="#" class="btn btn-outline-primary">Política y Gobierno</a>
                <a href="#" class="btn btn-outline-primary">Educación</a>
                <a href="#" class="btn btn-outline-primary">Bienestar y Salud</a>
                <a href="#" class="btn btn-outline-primary">Gobierno Local</a>
                <a href="#" class="btn btn-outline-primary">Justicia Penal</a>

                <a href="#" class="btn btn-outline-primary">Bienestar de Familias y Niños</a>
                <a href="#" class="btn btn-outline-primary">Justicia Económica</a>
                <a href="#" class="btn btn-outline-primary">Medioambiente</a>
                <a href="#" class="btn btn-outline-primary">Gobierno Nacional</a>
                <a href="#" class="btn btn-outline-primary">Negocios y Economía</a>

                <a href="#" class="btn btn-outline-primary">Entretenimiento y Medios</a>
                <a href="#" class="btn btn-outline-primary">Derechos de los Animales</a>
                <a href="#" class="btn btn-outline-primary">Conservación y Derechos de los Animales</a>
                <a href="#" class="btn btn-outline-primary">Corrupción</a>

                <a href="#" class="btn btn-outline-primary">Bienestar de los Animales</a>
                <a href="#" class="btn btn-outline-primary">Cuestiones Estudiantiles</a>
                <a href="#" class="btn btn-outline-primary">Salud Pública</a>
                <a href="#" class="btn btn-outline-primary">Derechos de los Niños</a>
                <a href="#" class="btn btn-outline-primary">Discapacidad</a>
                <a href="#" class="btn btn-outline-primary">Deportes</a>

                <a href="#" class="btn btn-outline-primary">Tecnología</a>
                <a href="#" class="btn btn-outline-primary">Gobierno Regional</a>
                <a href="#" class="btn btn-outline-primary">Derechos de las Mujeres</a>
                <a href="#" class="btn btn-outline-primary">Acceso a Atención Médica</a>
                <a href="#" class="btn btn-outline-primary">Derechos de los Pacientes</a>

                <a href="#" class="btn btn-outline-primary">Medio Ambiente</a>
                <a href="#" class="btn btn-outline-primary">Debido Proceso</a>
                <a href="#" class="btn btn-outline-primary">Elecciones y Derechos de los Votantes</a>
                <a href="#" class="btn btn-outline-primary">Prevención de Delitos</a>

            </div>
        </div>
        <div class="my-5">
            <h3><strong>Peticiones patrocinadas por otros usuarios de Change.org</strong></h3>
            <div class="row g-4">

{{--                <div class="col-12 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="card w-100">--}}
{{--                        <img src={{asset("assets/img/foto1Home.jpg")}} alt="" class="card-img-top">--}}
{{--                        <div class="card-body">--}}
{{--                            <p class="card-title">Patrocinado por un firmante</p>--}}
{{--                            <p class="card-text"><strong>Por una ley que prohíba la tala indiscriminada y promueva--}}
{{--                                    santuarios de árboles en España</strong>.</p>--}}
{{--                            <div class="d-flex align-items-center mb-3">--}}
{{--                                <img src={{asset("assets/img/pencil.png")}} alt="" style="width: 20px;">--}}
{{--                                <p class="text-primary m-0 ms-2"><strong>260.613 firmas</strong></p>--}}
{{--                            </div>--}}
{{--                            <a href="#" class="btn btn-outline-dark w-100">Firma esta peticion</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-12 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="card w-100">--}}
{{--                        <img src={{asset("assets/img/foto1Home.jpg")}} alt="" class="card-img-top">--}}
{{--                        <div class="card-body">--}}
{{--                            <p class="card-title">Patrocinado por un firmante</p>--}}
{{--                            <p class="card-text"><strong>Por una ley que prohíba la tala indiscriminada y promueva--}}
{{--                                    santuarios de árboles en España</strong>.</p>--}}
{{--                            <div class="d-flex align-items-center mb-3">--}}
{{--                                <img src={{asset("assets/img/pencil.png")}} alt="" style="width: 20px;">--}}
{{--                                <p class="text-primary m-0 ms-2"><strong>260.613 firmas</strong></p>--}}
{{--                            </div>--}}
{{--                            <a href="#" class="btn btn-outline-dark w-100">Firma esta peticion</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-12 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="card w-100">--}}
{{--                        <img src={{asset("assets/img/foto1Home.jpg")}} alt="" class="card-img-top">--}}
{{--                        <div class="card-body">--}}
{{--                            <p class="card-title">Patrocinado por un firmante</p>--}}
{{--                            <p class="card-text"><strong>Por una ley que prohíba la tala indiscriminada y promueva--}}
{{--                                    santuarios de árboles en España</strong>.</p>--}}
{{--                            <div class="d-flex align-items-center mb-3">--}}
{{--                                <img src={{asset("assets/img/pencil.png")}} alt="" style="width: 20px;">--}}
{{--                                <p class="text-primary m-0 ms-2"><strong>260.613 firmas</strong></p>--}}
{{--                            </div>--}}
{{--                            <a href="#" class="btn btn-outline-dark w-100">Firma esta peticion</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-12 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="card w-100">--}}
{{--                        <img src={{asset("assets/img/foto1Home.jpg")}} alt="" class="card-img-top">--}}
{{--                        <div class="card-body">--}}
{{--                            <p class="card-title">Patrocinado por un firmante</p>--}}
{{--                            <p class="card-text"><strong>Por una ley que prohíba la tala indiscriminada y promueva--}}
{{--                                    santuarios de árboles en España</strong>.</p>--}}
{{--                            <div class="d-flex align-items-center mb-3">--}}
{{--                                <img src={{asset("assets/img/pencil.png")}} alt="" style="width: 20px;">--}}
{{--                                <p class="text-primary m-0 ms-2"><strong>260.613 firmas</strong></p>--}}
{{--                            </div>--}}
{{--                            <a href="#" class="btn btn-outline-dark w-100">Firma esta peticion</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-12 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="card w-100">--}}
{{--                        <img src={{asset("assets/img/foto1Home.jpg")}} alt="" class="card-img-top">--}}
{{--                        <div class="card-body">--}}
{{--                            <p class="card-title">Patrocinado por un firmante</p>--}}
{{--                            <p class="card-text"><strong>Por una ley que prohíba la tala indiscriminada y promueva--}}
{{--                                    santuarios de árboles en España</strong>.</p>--}}
{{--                            <div class="d-flex align-items-center mb-3">--}}
{{--                                <img src={{asset("assets/img/pencil.png")}} alt="" style="width: 20px;">--}}
{{--                                <p class="text-primary m-0 ms-2"><strong>260.613 firmas</strong></p>--}}
{{--                            </div>--}}
{{--                            <a href="#" class="btn btn-outline-dark w-100">Firma esta peticion</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-12 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="card w-100">--}}
{{--                        <img src={{asset("assets/img/foto1Home.jpg")}} alt="" class="card-img-top">--}}
{{--                        <div class="card-body">--}}
{{--                            <p class="card-title">Patrocinado por un firmante</p>--}}
{{--                            <p class="card-text"><strong>Por una ley que prohíba la tala indiscriminada y promueva--}}
{{--                                    santuarios de árboles en España</strong>.</p>--}}
{{--                            <div class="d-flex align-items-center mb-3">--}}
{{--                                <img src={{asset("assets/img/pencil.png")}} alt="" style="width: 20px;">--}}
{{--                                <p class="text-primary m-0 ms-2"><strong>260.613 firmas</strong></p>--}}
{{--                            </div>--}}
{{--                            <a href="#" class="btn btn-outline-dark w-100">Firma esta peticion</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-12 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="card w-100">--}}
{{--                        <img src={{asset("assets/img/foto1Home.jpg")}} alt="" class="card-img-top">--}}
{{--                        <div class="card-body">--}}
{{--                            <p class="card-title">Patrocinado por un firmante</p>--}}
{{--                            <p class="card-text"><strong>Por una ley que prohíba la tala indiscriminada y promueva--}}
{{--                                    santuarios de árboles en España</strong>.</p>--}}
{{--                            <div class="d-flex align-items-center mb-3">--}}
{{--                                <img src={{asset("assets/img/pencil.png")}} alt="" style="width: 20px;">--}}
{{--                                <p class="text-primary m-0 ms-2"><strong>260.613 firmas</strong></p>--}}
{{--                            </div>--}}
{{--                            <a href="#" class="btn btn-outline-dark w-100">Firma esta peticion</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-12 col-md-6 col-lg-4 col-xl-3">--}}
{{--                    <div class="card w-100">--}}
{{--                        <img src={{asset("assets/img/foto1Home.jpg")}} alt="" class="card-img-top">--}}
{{--                        <div class="card-body">--}}
{{--                            <p class="card-title">Patrocinado por un firmante</p>--}}
{{--                            <p class="card-text"><strong>Por una ley que prohíba la tala indiscriminada y promueva--}}
{{--                                    santuarios de árboles en España</strong>.</p>--}}
{{--                            <div class="d-flex align-items-center mb-3">--}}
{{--                                <img src={{asset("assets/img/pencil.png")}} alt="" style="width: 20px;">--}}
{{--                                <p class="text-primary m-0 ms-2"><strong>260.613 firmas</strong></p>--}}
{{--                            </div>--}}
{{--                            <a href="#" class="btn btn-outline-dark w-100">Firma esta peticion</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                @foreach($petitions as $petition)
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                        <div class="card w-100">
                            <img src={{asset("assets/img/foto1Home.jpg")}} alt="" class="card-img-top">
                            <div class="card-body">
                                <p class="card-title">{{$petition->title}}</p>
                                <p class="card-text"><strong>{{$petition->description}}</strong>.</p>
                                <div class="d-flex align-items-center mb-3">
                                    <img src={{asset("assets/img/pencil.png")}} alt="" style="width: 20px;">
                                    <p class="text-primary m-0 ms-2"><strong>{{$petition->signers}} firmas</strong></p>
                                </div>
                                <a href="#" class="btn btn-outline-dark w-100">Firma esta peticion</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
