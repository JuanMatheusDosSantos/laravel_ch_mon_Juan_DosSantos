@php
    use Illuminate\Support\Facades\Auth
@endphp
    <!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Título Predeterminado')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
              crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
                crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
              integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
              crossorigin="anonymous"
              referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{asset("assets/css/carouselHome.css")}}">
        <link rel="stylesheet" href="{{asset("assets/css/general.css")}}">
        <script src="{{asset("assets/js/mijs.js")}}"></script>
    </head>

    <body>
        <header class="d-flex border-bottom">
            <div class="container d-flex justify-content-between align-items-center py-3">
                <div class="d-flex align-items-center gap-3">
                    <div>
                        <a href="{{route("home")}}" class="text-decoration-none text-danger">
                            <h3><strong> change.org</strong></h3>
                        </a>
                    </div>
                    <div class="d-lg-flex gap-3 d-none">
                        @if(Auth::check())
                            <a href="{{route("petitions.mine")}}"
                               class="text-decoration-none text-black mx-auto"><strong> Mis peticiones</strong></a>
                            <a href="{{route("petitions.mySigned")}}"
                               class="text-decoration-none text-black mx-auto"><strong> Peticiones firmadas</strong></a>
                        @else
                            <a href="{{route("login")}}" class="text-decoration-none text-black mx-auto"><strong> Mis
                                    peticiones</strong></a>
                        @endif
                        <a href="" class="text-decoration-none text-black"><strong> Programa de socios/as</strong></a>
                        <a href="{{route("petitions.index")}}" class="text-decoration-none text-black"><strong><img
                                    src="{{asset("assets/img/search.svg")}}"
                                    alt=""
                                    class="me-1">Buscar</strong></a>
                    </div>
                </div>
                <div class="d-flex my-auto gap-3 gap-lg-4">
                    <a href="{{route("petitions.create")}}"
                       class="text-decoration-none text-black border border-dark p-2 rounded"><strong>Inicia
                            una
                            peticion</strong></a>
                    @if(Auth::check())
                        <div class="dropdown-center" id="navbarNavDarkDropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <a class="text-decoration-none text-black my-auto"><strong>{{Auth::user()->name}}</strong></a>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <x-responsive-nav-link :href="route('profile.edit')"
                                                           class="text-decoration-none text-black my-auto">
                                        {{ __('Profile') }}
                                    </x-responsive-nav-link>
                                </li>
                                <li class="ps-3">
                                    @if(Auth::check()&&Auth::user()->role_id===1)
                                        <a href="{{route("admin.home")}}"
                                           class="text-decoration-none text-black mx-auto">
                                            Dashboard</a>
                                    @endif
                                </li>
                                <li>
                                    <form method="POST" action="{{route('logout')}}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                                         onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                                         class="text-decoration-none text-black my-auto">
                                            {{__('Log Out')}}
                                        </x-dropdown-link>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{route("login")}}"
                           class="text-decoration-none text-black my-auto"><strong>Entrar</strong></a>
                        <a href="{{route("register")}}" class="text-decoration-none text-black my-auto"><strong>Registrarse</strong></a>
                    @endif
                </div>
                <div class="d-flex d-md-none">
                    <a href="{{route("petitions.index")}}"
                       class="text-decoration-none text-black d-none d-sm-block"><img
                            src="{{asset("assets/img/search.svg")}}"
                            alt="" class="me-1"></a>
                    <div class="btn-group d-lg-none">
                        <button type="button" class="btn btn-outline-dark" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            menu
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end text-center bg-transparent">
                            @if(Auth::check())
                                <li>
                                    <a href="" class="text-decoration-none text-black mx-auto"> Mis
                                        peticiones</a>
                                </li>
                                <li>{{__("Profile")}}</li>
                            @else
                                <li>
                                    <a href="{{route("petitions.index")}}" class="text-decoration-none text-black">
                                        Buscar</a>
                                </li>
                                <li>
                                    <a href="" class="text-decoration-none text-black"> Entra o registrate</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        @yield("content")
        <footer class="px-3 pt-5 border-top d-flex flex-column align-items-center">
            <div class="container w-100">
                <div class="d-flex w-100 gap-4 justify-content-between flex-wrap">
                    <div class="d-flex flex-column gap-2">
                        <h2 class="text-16">Acerca de</h2>
                        <p class="text-16"><a href="" class="text-decoration-none text-black">Sobre Change.org</a></p>
                        <p><a href="" class="text-decoration-none text-black">Impacto</a></p>
                        <p><a href="" class="text-decoration-none text-black">Empleo</a></p>
                        <p><a href="" class="text-decoration-none text-black">Equipo</a></p>
                    </div>
                    <div class="d-flex flex-column gap-2 ">
                        <h2 class="text-16">Comunidad</h2>
                        <p><a href="" class="text-decoration-none text-black">Prensa</a></p>
                        <p><a href="" class="text-decoration-none text-black">Normas de la comunidad</a></p>
                    </div>
                    <div class="d-flex flex-column gap-2">
                        <h2 class="text-16">Ayuda</h2>
                        <p><a href="" class="text-decoration-none text-black">Ayuda</a></p>
                        <p><a href="" class="text-decoration-none text-black">Guias</a></p>
                        <p><a href="" class="text-decoration-none text-black">Privacidad</a></p>
                        <p><a href="" class="text-decoration-none text-black">Terminos</a></p>
                        <p><a href="" class="text-decoration-none text-black">Declaracion de accesibilidad</a></p>
                        <p><a href="" class="text-decoration-none text-black">Politica de cookies</a></p>
                        <p><a href="" class="text-decoration-none text-black">Gestionar cookies</a></p>
                    </div>
                    <div class="d-flex flex-column gap-2 ">
                        <h2 class="text-16">Redes sociales</h2>
                        <p><a href="" class="text-decoration-none text-black">X</a></p>
                        <p><a href="" class="text-decoration-none text-black">Facebook</a></p>
                        <p><a href="" class="text-decoration-none text-black">Instagram</a></p>
                        <p><a href="" class="text-decoration-none text-black">Tiktok</a></p>
                    </div>
                </div>
                <hr class="w-100 my-5">
                <div class="d-flex gap-2 my-5 justify-content-between">
                    <div>
                        <p><strong>© 2025, Change.org, PBC</strong></p>
                        <p>Esta web está protegida por reCAPTCHA y por Google Política de privacidad y Normas de
                            uso.</p>
                    </div>
                    <div class="m-auto d-flex">
                        <select name="idioma" id="idioma" class="form-select form-select-lg mb-3 border-dark">
                            <option value="spain">Español(españa)</option>
                            <option value="english">English (Uk)</option>
                        </select>
                    </div>
                </div>
            </div>
        </footer>
    </body>

</html>
