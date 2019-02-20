@extends('layout')

@section('title', $title)

@section('content')
    <h1 class="page-title">
        {{ $title }}
    </h1>

    @include('products.dates')

    <div class="description">
        <p>{!! nl2br(e($product->description)) !!}</p>
    </div>

    @if ($product->prices->count())
        <h3>{{ __('Ceny') }}</h3>
        <ul class="product-price-list list-group mb-3">
            @foreach($product->prices as $price)
                <li class="list-group-item">
                    {{ $price->name }} - {{ $price->value }} {{ $price->unit }}
                </li>
            @endforeach
        </ul>
    @endif

    <div class="links">
        <a class="btn btn-success" href="/products/{{ $product->id }}/edit">{{ __('Edytuj') }}</a>
        <a class="btn btn-danger ml-1" href="/products/{{ $product->id }}/delete">{{ __('Usuń') }}</a>
        <a class="btn btn-secondary ml-1" href="/products">{{ __('Powrót') }}</a>
    </div>
@endsection
