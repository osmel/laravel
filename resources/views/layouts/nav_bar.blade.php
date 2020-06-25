 <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('/images/logo.png') }}" alt="" sizes="64x64" >
                    {{-- config('app.name', 'Autos') --}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ trans('autenticacion.Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{-- lado izquierdo del Navbar --}}

                  <ul class="navbar-nav mr-auto">
                      
                      <li class="nav-item active">
                        <a class="nav-link" href="#">Usuarios</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Catalogos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="#">uno</a>
                          <a class="dropdown-item" href="#">dos</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">otros</a>
                        </div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Deshabilitado</a>
                      </li>


                    </ul>


                    {{-- lado derecho del Navbar --}}
                    <ul class="navbar-nav ml-auto">
                        {{-- Enlaces de autenticacion --}}
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
                    </ul>

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