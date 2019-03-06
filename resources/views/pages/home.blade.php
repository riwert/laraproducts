@extends('layout')

@section('title', $title)

@section('content')
    <h1 class="page-title">
        {{ $title }}
    </h1>

    @include('products.list')

    <div class="links">
        <a class="btn btn-primary" href="{{ route('products.index') }}">{{ __('Zobacz wszystkie produkty') }}</a>
        <a class="btn btn-primary ml-1" href="{{ route('products.add') }}">{{ __('Dodaj produkt') }}</a>
        <a class="btn btn-primary ml-1" href="{{ route('categories.index') }}">{{ __('Zobacz kategorie') }}</a>
        @if (Auth::user() && Auth::user()->isAdmin())
            <a class="btn btn-primary ml-1" href="{{ route('categories.add') }}">{{ __('Dodaj kategorię') }}</a>
        @endif
        @if (Auth::guest())
            <a class="btn btn-primary ml-1" href="{{ route('login') }}">{{ __('Zaloguj się') }}</a>
            <a class="btn btn-primary ml-1" href="{{ route('register') }}">{{ __('Zarejestruj się') }}</a>
        @endif
    </div>
@endsection
