@extends('layout')

@section('title', $title)

@section('content')
    <h1 class="page-title">
        {{ $title }}
    </h1>

    @include('categories.details')

    <div class="description">
        <p>{!! nl2br(e($category->description)) !!}</p>
    </div>

    <div class="links">
        @can('manage', $category)
            <a class="btn btn-success" href="{{ route('categories.edit', ['id' => $category->id]) }}">{{ __('Edytuj') }}</a>
            <a class="btn btn-danger ml-1" href="{{ route('categories.delete', ['id' => $category->id]) }}">{{ __('Usuń') }}</a>
        @endcan
        <a class="btn btn-secondary ml-1" href="{{ route('categories.index') }}">{{ __('Powrót') }}</a>
    </div>
@endsection
