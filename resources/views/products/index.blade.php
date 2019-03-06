@extends('layout')

@section('title', $title)

@section('content')
    <h1 class="page-title">
        {{ $title }}
    </h1>

    @include('products.list')

    <div class="links">
        <a class="btn btn-primary" href="{{ route('products.add') }}">{{ __('Dodaj produkt') }}</a>
    </div>
@endsection
