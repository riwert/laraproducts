@if ($products->count())
    <ul class="product-list list-group mb-3">
        @foreach ($products as $product)
            <li class="list-group-item list-group-item-action">
                <a href="{{ route('products.view', ['slug' => $product->slug]) }}">{{ $product->name }}</a>

                @can('modify', $product)
                    <a class="btn btn-danger float-right ml-1" href="{{ route('products.delete', ['id' => $product->id]) }}">{{ __('Usuń') }}</a>
                    <a class="btn btn-success float-right ml-1" href="{{ route('products.edit', ['id' => $product->id]) }}">{{ __('Edytuj') }}</a>
                @endcan

                @cannot('modify', $product)
                    <div class="user float-right ml-1 text-right">
                        {{ __('Dodany przez') }}:<br>
                        <strong>{{ $product->user->name }}</strong>
                    </div>
                @endcannot

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
    <nav class="pagination-container justify-content-center" aria-label="{{ __('Stronicowanie produktów') }}">
        {{ $products->links('vendor.pagination.bootstrap-4') }}
    </nav>
@endif
