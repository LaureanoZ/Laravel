<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <link rel="shortcut icon" href="{{ url('favicon-ww.png') }}" type="image/x-icon">
    <title>@yield('title') - Administración</title>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg ww-bg-color">
        <div class="container">
          <h1 class="ww-font pt-lg-2">Wedding Web</h1>
            <button class="navbar-toggler mt-n1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          <div class="collapse navbar-collapse justify-content-end ww-bg-color py-2 px-2 mt-n1 z-1" id="navbarNav">
            <ul class="navbar-nav align-items-center">
              <li class="nav-item w-100">
                <a class="nav-link text-center w-100 fw-bold ww-focus text-nowrap" aria-current="page" href="{{ route('home') }}">Volver a la pagina</a>
              </li>
              <li class="nav-item w-100">
                <a class="nav-link text-center w-100 fw-bold ww-focus" href="{{ route('admin.servicesDashboard') }}">Servicios</a>
              </li>
              <li class="nav-item w-100">
                <a class="nav-link text-center w-100 fw-bold ww-focus" href="{{ route('admin.blogsDashboard') }}">Blog</a>
              </li>
              <li class="nav-item w-100">
                <a class="nav-link text-center w-100 fw-bold ww-focus" href="{{ route('admin.usersDashboard') }}">Usuarios</a>
              </li>
              @auth
              <li class="nav-item">
                <form action="{{ route('auth.processLogout') }}" method="post">
                @csrf
                  <button class="btn btn-danger text-nowrap" type="submit">Cerrar Sesion</button>
                </form>
              </li>
              @else    
              <li class="nav-item">
                <a class="btn btn-nav text-white text-nowrap" href="{{ route('auth.formLogin') }}">Iniciar Sesion</a>
              </li>
              @endauth
            </ul>
          </div>
        </div>
      </nav>
  <main class="container">
    @if (Session::has('feedback.message'))
    <div class="alert alert-{{ Session::get('feedback.type', 'success') }} d-flex align-items-center" role="alert">
      <div>{!! Session::get('feedback.message') !!}</div>
    </div>
    @endif
      @yield('master')
  </main>

  <footer class="footer d-flex align-items-center">
      <div class="container mt-3">
          <div class="row justify-content-center align-items-center">
              <p class="ww-font h4 text-nowrap col-12 text-center">Wedding Wedding</p>
              <p class="col-12 text-center">&copy; Wedding Web 2023. Todos los derechos reservados. Descubre nuestras últimas novedades en servicios de alta calidad</p>
          </div>
      </div>
  </footer>

</div>
    <script src="{{ url('js/bootstrap.bundle.js') }}"></script>
</body>
</html>