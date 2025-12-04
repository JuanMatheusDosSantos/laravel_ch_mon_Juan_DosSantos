@extends("layouts.public")
@section("title")
    Mis Firmas
@endsection
@section("content")
    <div class="container">
        <div class="my-5">
            <h3 class="text-center pb-5"><strong>Peticiones que firmaste</strong></h3>
            <div class="row g-4">
                @foreach($signeds as $signed)
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                        <a href="{{route("petitions.show",["id"=>$signed->id])}}"
                           class="text-decoration-none text-black">
                            <div class="card w-100">
                                <img src="{{asset("assets/img/petitions/{$signed->file->file_path}")}}" alt=""
                                     class="card-img-top">
                                <div class="card-body">
                                    <p class="card-title">{{$signed->title}}</p>
                                    <p class="card-text"><strong>{{$signed->description}}</strong>.</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <img src={{asset("assets/img/pencil.png")}} alt="" style="width: 20px">
                                        <p class="text-primary m-0 ms-2"><strong>{{$signed->signers}} firmas</strong>
                                        </p>
                                    </div>
                                </div>
                                <form method="post"
                                      action="{{route("petitions.firmar",["id"=>$signed->id])}}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-dark w-100">
                                        Des-firmar esta petición
                                    </button>
                                </form>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
