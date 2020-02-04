<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm better-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">
           {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @auth
                <li class="nav-item dropdown">
                    <a id="navbarDropdown1" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Módulos<span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown1">
                        <a class="dropdown-item" href="#parcelas">{{ __('Parcelas') }}</a>
                        <a class="dropdown-item" href="#riego">{{ __('Riego') }}</a>
                        <a class="dropdown-item" href="#plantas">{{ __('Plantas') }}</a>
                        <a class="dropdown-item" href="#monitoreo">{{ __('Monitoreo') }}</a>
                        <a class="dropdown-item" href="#dispositivos">{{ __('Dispositivos') }}</a>
                        <div class="dropdown-divider"></div>
                        @can('users.index') <a class="dropdown-item" href="{{ route('users.index') }}">{{ __('Usuarios') }}</a> @endcan
                        @can('roles.index') <a class="dropdown-item" href="{{ route('roles.index') }}">{{ __('Roles') }}</a> @endcan
                    </div>
                </li>
                @endauth
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                   <!-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif-->
                @else
                    <!--<li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">{{ __('Usuarios') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('roles.index') }}">{{ __('Roles') }}</a>
                    </li>-->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile.show') }}">
                                {{ __('Perfil') }}
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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