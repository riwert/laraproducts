@extends('layout')

@section('title', $title)

@section('content')
    <h1 class="page-title">
        {{ $title }}
    </h1>

    @include('products.details')

    <form method="POST" action="{{ route('products.update', ['id' => $product->id]) }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="form-group">
            <input class="form-control" type="text" name="name" value="{{ $product->name or old('name') }}" placeholder="{{ __('Nazwa produktu') }}" required>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="slug" value="{{ $product->slug or old('slug') }}" placeholder="{{ __('Unikalny URL') }}" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="description" placeholder="{{ __('Opis produktu') }}" required>{{ $product->description or old('description') }}</textarea>
        </div>
        <div class="form-group">
            @include('products.prices-input')
        </div>
        <div class="links">
            <button class="btn btn-primary" type="submit">{{ __('Zapisz zmiany') }}</button>
            <a class="btn btn-secondary ml-1" href="{{ route('products.index') }}">{{ __('Powrót') }}</a>
        </div>
    </form>
@endsection
