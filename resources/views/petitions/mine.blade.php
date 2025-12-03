@extends("layouts.public")
@section("title")
    Mis Peticiones
@endsection
@section("content")
    <div class="container">
        <div class="my-5">
            <h3 class="text-center pb-5"><strong>Peticiones que creaste</strong></h3>
            <div class="row g-4">
                @foreach($petitions as $petition)
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                            <a href="{{route("petitions.show",["id"=>$petition->id])}}"
                               class="text-decoration-none text-black">
                            <div class="card w-100">
                                <img src="{{asset("assets/img/petitions/{$petition->file->file_path}")}}" alt=""
                                     class="card-img-top">
                                <div class="card-body">
                                    <p class="card-title">{{$petition->title}}</p>
                                    <p class="card-text"><strong>{{$petition->description}}</strong>.</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <img src={{asset("assets/img/pencil.png")}} alt="" style="width: 20px">
                                        <p class="text-primary m-0 ms-2"><strong>{{$petition->signers}} firmas</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
