@extends('layout')

@section('title', $title)

@section('content')
    <h1 class="page-title">
        {{ $title }}
    </h1>

    <form method="POST" action="{{ route('products.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('Nazwa produktu') }}" required="required">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="slug" value="{{ old('slug') }}" placeholder="{{ __('Unikalny URL') }}" required="required">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="description" placeholder="{{ __('Opis produktu') }}" required="required">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            @include('products.prices-input')            
        </div>

        <div class="links">
            <button class="btn btn-primary" type="submit">{{ __('Zapisz produkt') }}</button>
            <a class="btn btn-secondary ml-1" href="{{ route('products.index') }}">{{ __('Powrót') }}</a>
        </div>
    </form>
@endsection
