<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token para todo el sistema--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Autos') }}</title>

    <link rel="icon" href="{{ asset( '/images/logo.png' ) }}" sizes="32x32">

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
        
        {{-- Navegacion--}}
        @include('layouts.nav_bar');

    <!-- Begin page content -->
    <main role="main" class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
               @yield('content')
            </div>
        

        </div>
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
