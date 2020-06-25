<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token sistema--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Autos') }}</title>
    <link rel="icon" href="{{ asset( '/images/logo.png' ) }}" sizes="32x32">

    {{-- Scripts sistema
    <script src="{{ asset('js/app.js') }}" defer></script>
    --}}

    {{-- Fonts sistema
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    --}}

    {{-- Styles sistema
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    --}}
    



    {{--propio mio --}}
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">

    {{--iconos--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">

    {{-- CSS only bootstrap--}}
     <link rel="stylesheet" href="{{ asset('plugins/bootstrap-4.5.0/dist/css/bootstrap.min.css') }}">
    
    {{--seleccion cajas largas intuitiva --}}
    <link rel="stylesheet" href="{{ asset('plugins/chosen/css/chosen.css') }}">
    
    {{--nose... para agregar un complemento --}}
    <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.css') }}">

    {{-- CSS datatables--}}
    <link rel="stylesheet" href="{{ asset('plugins/dataTables-1.10.21/DataTables-1.10.21/css/jquery.dataTables.min.css') }}">






</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('/images/logo.png') }}" alt="" sizes="64x64" >
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ trans('autenticacion.Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{-- Left Side Of Navbar --}}
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    {{-- Right Side Of Navbar --}}
                    <ul class="navbar-nav ml-auto">
                        {{-- Authentication Links --}}
                        @guest
                            {{--
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ trans('autenticacion.Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ trans('autenticacion.Register') }}</a>
                                </li>
                            @endif
                            --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ trans('autenticacion.Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                         <ul class="nav navbar-nav navbar-right">
                                <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Idioma
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('lang', ['es']) }}" >Es</a>
                                    <a class="dropdown-item" href="{{ url('lang', ['en']) }}" >En</a>
 

                                  </div>
                          </li>



                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>



    {{--jquery --}}
    <script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.4.js') }}"></script>

    {{--version bootstrap-4.5.0--}}
    <script type="text/javascript" src="{{ asset('plugins/bootstrap-4.5.0/dist/js/bootstrap.js') }}"></script>
    {{--seleccion intuitiva --}}
    <script type="text/javascript" src="{{ asset('plugins/chosen/js/chosen.jquery.js')}}" ></script>

    {{--Un editor ligero WYSIWYG --}}
    <script type="text/javascript" src="{{ asset('plugins/trumbowyg/trumbowyg.js')}}"></script>

    {{-- datatables--}}
    <script type="text/javascript" src="{{ asset('plugins/dataTables-1.10.21/DataTables-1.10.21/js/jquery.dataTables.min.js')}}"></script>


       {{-- Personal--}}
    <script type="text/javascript" src="{{ URL::to('js/sistema.js') }}"></script>

    

</body>
</html>
