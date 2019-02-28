@extends('layout')

@section('title', $title)

@section('content')
    <h1 class="page-title">
        {{ $title }}
    </h1>

    @include('products.dates')

    <form method="POST" action="{{ action('ProductsController@destroy', ['id' => $product->id]) }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <div class="form-group">
            <h2>{{ __('Czy na pewno chcesz usunąć ten produkt?') }}</h2>
        </div>
        <div class="links">
            <button class="btn btn-danger" type="submit">{{ __('Potwierdź usunięcie') }}</button>
            <a class="btn btn-secondary ml-1" href="{{ action('ProductsController@index') }}">{{ __('Powrót') }}</a>
        </div>
    </form>
@endsection
