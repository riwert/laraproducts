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

    @if ($category->products->count())
        <h3>{{ __('Produkty') }}</h3>
        <ul class="product-list list-group mb-3">
            @foreach ($category->products as $product)
                <li class="list-group-item">
                    <a href="{{ route('products.view', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                    
                    @if ($product->prices->count())
                        <ul class="product-price-list">
                            @foreach ($product->prices as $price)
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
        @can('manage', $category)
            <a class="btn btn-success" href="{{ route('categories.edit', ['id' => $category->id]) }}">{{ __('Edytuj') }}</a>
            <a class="btn btn-danger ml-1" href="{{ route('categories.delete', ['id' => $category->id]) }}">{{ __('Usuń') }}</a>
        @endcan
        <a class="btn btn-secondary ml-1" href="{{ route('categories.index') }}">{{ __('Powrót') }}</a>
    </div>
@endsection
