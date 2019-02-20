@extends('layout')

@section('title', $title)

@section('content')
    <h1 class="page-title">
        {{ $title }}
    </h1>

    <div class="links">
        <a class="btn btn-primary" href="/products">Zobacz produkty</a>
        <a class="btn btn-primary ml-1" href="/products/add">Dodaj produkt</a>
    </div>
@endsection
