<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">{{ __('Strona główna') }}</a>
                </li>
                <li class="nav-item {{ Request::is('products') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('products.index') }}">{{ __('Produkty') }}</a>
                </li>                      
                <li class="nav-item {{ Request::is('products/add') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('products.add') }}">{{ __('Dodaj produkt') }}</a>
                </li>                      
            </ul>    
        </div>
    </div>
</nav>
