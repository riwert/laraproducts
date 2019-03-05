@extends('layout')

@section('title', $title)

@section('content')
    <h1 class="page-title">
        {{ $title }}
    </h1>

    @include('categories.details')

    <form method="POST" action="{{ route('categories.update', ['id' => $category->id]) }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="form-group">
            <input class="form-control" type="text" name="name" value="{{ $category->name or old('name') }}" placeholder="{{ __('Nazwa kategorii') }}" required>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="slug" value="{{ $category->slug or old('slug') }}" placeholder="{{ __('Unikalny URL') }}" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="description" placeholder="{{ __('Opis kategorii') }}" required>{{ $category->description or old('description') }}</textarea>
        </div>        
        <div class="links">
            <button class="btn btn-primary" type="submit">{{ __('Zapisz zmiany') }}</button>
            <a class="btn btn-secondary ml-1" href="{{ route('categories.index') }}">{{ __('Powrót') }}</a>
        </div>
    </form>
@endsection
