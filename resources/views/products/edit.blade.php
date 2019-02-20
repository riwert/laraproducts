@extends('layout')

@section('title', $title)

@section('content')
    <h1 class="page-title">
        {{ $title }}
    </h1>

    @include('products.dates')

    <form method="POST" action="/products/{{ $product->id }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="form-group">
            <input class="form-control" type="text" name="name" value="{{ $product->name }}" placeholder="{{ __('Nazwa produktu') }}" required="required">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="slug" value="{{ $product->slug }}" placeholder="{{ __('Unikalny URL') }}" required="required">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="description" placeholder="{{ __('Opis produktu') }}" required="required">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            @include('products.prices-input')
        </div>
        <div class="links">
            <button class="btn btn-primary" type="submit">{{ __('Zapisz zmiany') }}</button>
            <a class="btn btn-secondary ml-1" href="/products">{{ __('Powrót') }}</a>
        </div>
    </form>
@endsection
