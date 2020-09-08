<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/mediascreen.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tangerine&display=swap" rel="stylesheet"> 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color:teal;" ><!--navbar-expand-md navbar-dark bg-primary shadow-sm -->
            <div class="container-fluid">
                <a class="navbar-brand" style="color:red;" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                         <li class="nav-item">
                            <a class="nav-link" href="{{ route('site.products.articles.article') }}">RECETTES DU MONDE</a>
                         </li>
                         <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            RECETTE PAR CATEGORIES
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('site.products.categories.dessert') }}">DESSERTS</a>
                              <a class="dropdown-item" href="{{ route('site.products.categories.entree') }}">ENTREES</a>
                              <a class="dropdown-item" href="{{ route('site.products.categories.aperitif') }}">APERITIFS</a>
                              <a class="dropdown-item" href="{{ route('site.products.categories.boisson') }}">BOISSONS</a>
                              <a class="dropdown-item" href="{{ route('site.products.categories.plat') }}">PLATS</a>
                              <a class="dropdown-item" href="{{ route('site.products.categories.petitdejeuner') }}">PETITDEJEUNER</a>
                              <a class="dropdown-item" href="{{ route('site.products.categories.dejeuner') }}">DEJEUNER</a>
                              <a class="dropdown-item" href="{{ route('site.products.categories.diner') }}">DINER</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                          </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{ route('site.products.contacts.create') }}">CONTACT</a>
                         </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                                <a class="nav-link" style="display:inline-block;background-color:#000;height:auto;" href="{{ route('site.profils.create') }}">PUBLIER UNE RECETTE</a>
                            </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('site.profils.index') }}">Comptes
                                      
                                    </a>
                                   
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- debut slider --> 
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/images/casserole.jpg" class="d-block w-100" alt="..." height="400">
      <div class="carousel-caption d-none d-md-block">
        <h1><a href=""> First slide label</a></h1>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="/images/salad.jpg" class="d-block w-100" alt="..." height="400">
      <div class="carousel-caption d-none d-md-block">
        <h1><a href="">Second slide label</a></h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="/images/strawberry.jpg" class="d-block w-100" alt="..." height="400">
      <div class="carousel-caption d-none d-md-block">
        <h1><a href="">Third slide label</a></h1>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        <!-- Fin de slider -->


        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
<footer style="background-color:teal;" class="page-footer font-small blue pt-4">

<!-- Footer Links -->
<div class="container-fluid text-center text-md-left">

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-md-6 mt-md-0 mt-3">

      <!-- Content -->
      <h5 class="text-uppercase" style="color:#fff;">Footer Content</h5>
      <p style="color:#fff;">Here you can use rows and columns to organize your footer content.</p>

    </div>
    <!-- Grid column -->

    <hr class="clearfix w-100 d-md-none pb-3">

    <!-- Grid column -->
    <div class="col-md-3 mb-md-0 mb-3">

      <!-- Links -->
      <h5 class="text-uppercase" style="color:red;">Links</h5>

      <ul class="list-unstyled">
        <li>
          <a href="{{ route('site.products.contacts.cgv') }}" style="color:#fff;" >CGV</a>
        </li>
        <li>
          <a href="{{ route('site.products.contacts.cgu') }}" style="color:#fff;">CGU</a>
        </li>
        <li>
          <a href="{{ route('site.products.contacts.create') }}" style="color:#fff;">CONTACT</a>
        </li>
       
      </ul>

    </div>
    <!-- Grid column -->
     <!-- Grid column -->
     <div class="col-md-3 mb-md-0 mb-3">


    <!-- Grid column -->
    <div class="col-md-3 mb-md-0 mb-3">

      <!-- Links -->
      <h5 class="text-uppercase">Links</h5>

      <ul class="list-unstyled">
        <li>
          <a href="#!">Link 1</a>
        </li>
        <li>
          <a href="#!">Link 2</a>
        </li>
        <li>
          <a href="#!">Link 3</a>
        </li>
        <li>
          <a href="#!">Link 4</a>
        </li>
      </ul>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</div>
<!-- Footer Links -->

<!-- Copyright -->
<div style="background-color:#000; color:#fff;" class="footer-copyright text-center py-3">© 2020 Copyright:
  <a style="color:#fff;" href="https://mdbootstrap.com/"> MDBootstrap.com</a>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->

</body>
</html>
