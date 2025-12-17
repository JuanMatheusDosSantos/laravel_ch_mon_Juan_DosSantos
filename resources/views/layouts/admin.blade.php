@php
    use Illuminate\Support\Facades\Auth
@endphp
    <!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Admin Panel')</title>

        {{-- Incluye Font Awesome para los íconos (Campana, Check, etc.) --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
              integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
              crossorigin="anonymous"
              referrerpolicy="no-referrer"/>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
              crossorigin="anonymous">

        {{-- Tus archivos CSS --}}
        <link rel="stylesheet" href="{{asset("assets/css/carouselHome.css")}}">
        <link rel="stylesheet" href="{{asset("assets/css/general.css")}}">
        <link rel="stylesheet" href="{{asset("assets/css/admin.css")}}">

    </head>

    <body>
        @if(session('alert'))
            <script>
                alert("{{ session('alert') }}");
            </script>
        @endif

        <aside class="sidebar">
            <div class="sidebar-header">
                <a href="{{route("home")}}" class="text-decoration-none text-white">
                change.org
                </a>
            </div>

            <div class="admin-profile">
                <img src="{{asset("/assets/img/users/tabibito.jpg") }}"
                     alt="Avatar Admin" class="admin-avatar">
                <div class="fw-bold">{{ Auth::user()->name}}</div>
            </div>

            <div class="p-3 text-uppercase fw-bold opacity-75">Main Menu</div>

            <nav class="nav flex-column sidebar-menu">
                {{-- Los enlaces deben apuntar a tus rutas --}}
                <a class="nav-link {{(url()->current()==route("admin.home")?"active":"")}}" href="{{route('admin.home') }}"><i class="fas fa-file-alt me-2"></i>
                    Peticiones</a>
                <a class="nav-link {{(url()->current()==route("admincategories.index")?"active":"")}}"  href="{{ route('admincategories.index') }}"><i class="fas fa-tags me-2"></i>
                    Categorías</a>
                <a class="nav-link {{(url()->current()==route("adminusers.index")?"active":"")}}" href="{{ route('adminusers.index') }}"><i class="fas fa-users me-2"></i>
                    Usuarios</a>
            </nav>
        </aside>

        <div class="main-content">

            <header class="topbar">
                <div class="col-8 col-md-4">
                    <input type="search" class="form-control" placeholder="Search Here">
                </div>
                <div class="d-flex align-items-center">
                    <div class="position-relative me-3">
                        <i class="fas fa-bell text-secondary fs-5"></i>
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">2</span>
                    </div>
                    <div class="position-relative me-3">
                        <i class="fas fa-envelope text-secondary fs-5"></i>
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">?</span>
                    </div>
                    <div class="dropdown-center" id="navbarNavDarkDropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            <a class="text-decoration-none text-black my-auto"><strong><img
                                        src="{{asset("/assets/img/users/tabibito.jpg")}}" alt=""
                                        style="width: 50px; height: 50px;" class="rounded-circle"></strong></a>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <x-responsive-nav-link :href="route('profile.edit')"
                                                       class="text-decoration-none text-black my-auto">
                                    {{ __('Profile') }}
                                </x-responsive-nav-link>
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
                </div>
            </header>

            <main class="content-wrapper">
                @yield("content")
            </main>

            <footer class="px-3 pt-5 border-top d-flex flex-column align-items-center mt-auto">
                <p class="text-muted small">© {{ date('Y') }} Mi Aplicación Admin</p>
            </footer>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
                crossorigin="anonymous"></script>
        <script src="{{asset("assets/js/mijs.js")}}"></script>
    </body>
</html>
