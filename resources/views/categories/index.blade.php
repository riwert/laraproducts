@extends('layout')

@section('title', $title)

@section('content')
    <h1 class="page-title">
        {{ $title }}
    </h1>

    @if ($categories->count())
        <ul class="category-list list-group mb-3">
            @foreach($categories as $category)
                <li class="list-group-item list-group-item-action">
                    <a href="{{ route('categories.view', ['slug' => $category->slug]) }}">{{ $category->name }}</a>

                    @if ($category->products->count())
                        <span class="products-count ml-1">
                            ({{ __('Produkty') }}:<br>
                            <strong>{{ $category->products->count() }}</strong>)
                        </span>
                    @endif

                    @can('manage', $category)
                        <a class="btn btn-danger float-right ml-1" href="{{ route('categories.delete', ['id' => $category->id]) }}">{{ __('Usuń') }}</a>
                        <a class="btn btn-success float-right ml-1" href="{{ route('categories.edit', ['id' => $category->id]) }}">{{ __('Edytuj') }}</a>
                    @endcan
                </li>
            @endforeach
        </ul>
        <nav class="pagination-container justify-content-center" aria-label="{{ __('Stronicowanie kategorii') }}">
            {{ $categories->links('vendor.pagination.bootstrap-4') }}
        </nav>
    @endif

    <div class="links">
        <a class="btn btn-primary" href="{{ route('categories.add') }}">{{ __('Dodaj kategorię') }}</a>
    </div>
@endsection
