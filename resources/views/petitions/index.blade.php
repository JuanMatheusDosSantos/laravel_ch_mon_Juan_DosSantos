@extends("layouts.public");
@section("content")
    <div class="container">
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
                @foreach($petitions as $petition)
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                        <div class="card w-100">
                            <a href="{{route("petitions.show",["id"=>$petition->id])}}">
                            <img src={{asset("assets/img/petitions/{$petition->file->file_path}")}} alt="{{$petition->file->name}}" class="card-img-top">
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
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
