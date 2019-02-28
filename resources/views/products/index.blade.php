@extends('layout')

@section('title', $title)

@section('content')
    <h1 class="page-title">
        {{ $title }}
    </h1>

    @if ($products->count())
        <ul class="product-list list-group mb-3">
            @foreach($products as $product)
                <li class="list-group-item list-group-item-action">
                    <a href="{{ route('products.view', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                    <a class="btn btn-danger float-right ml-1" href="{{ route('products.delete', ['id' => $product->id]) }}">{{ __('Usuń') }}</a>
                    <a class="btn btn-success float-right ml-1" href="{{ route('products.edit', ['id' => $product->id]) }}">{{ __('Edytuj') }}</a>

                    @if ($product->prices->count())
                        <ul class="product-price-list">
                            @foreach($product->prices as $price)
                                <li>
                                    {{ $price->name }} - {{ $price->value }} {{ $price->unit }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif

    <div class="links">
        <a class="btn btn-primary" href="{{ route('products.add') }}">{{ __('Dodaj produkt') }}</a>
    </div>
@endsection
