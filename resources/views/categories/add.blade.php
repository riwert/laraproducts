@extends('layout')

@section('title', $title)

@section('content')
    <h1 class="page-title">
        {{ $title }}
    </h1>

    <form method="POST" action="{{ route('categories.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('Nazwa kategorii') }}" required>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="slug" value="{{ old('slug') }}" placeholder="{{ __('Unikalny URL') }}" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="description" placeholder="{{ __('Opis kategorii') }}" required>{{ old('description') }}</textarea>
        </div>

        <div class="links">
            <button class="btn btn-primary" type="submit">{{ __('Zapisz kategorię') }}</button>
            <a class="btn btn-secondary ml-1" href="{{ route('categories.index') }}">{{ __('Powrót') }}</a>
        </div>
    </form>
@endsection
