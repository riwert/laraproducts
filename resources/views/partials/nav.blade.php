<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">{{ __('Strona główna') }}</a>
                </li>
                <li class="nav-item {{ Request::is('products') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('products.index') }}">{{ __('Produkty') }}</a>
                </li>
                <li class="nav-item {{ Request::is('products/add') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('products.add') }}">{{ __('Dodaj produkt') }}</a>
                </li>
                <li class="nav-item {{ Request::is('categories') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('categories.index') }}">{{ __('Kategorie') }}</a>
                </li>
                @if (Auth::user() && Auth::user()->isAdmin())                    
                    <li class="nav-item {{ Request::is('categories/add') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('categories.add') }}">{{ __('Dodaj kategorię') }}</a>
                    </li>
                @endif
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Zaloguj') }}</a>
                    </li>
                    <li class="nav-item {{ Request::is('register') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Zarejestruj') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="{{ route('users.edit', ['id' => Auth::user()->id]) }}">{{ __('Konto') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Wyloguj') }}
                            </a>
                            <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
