<h3>{{ __('Ceny') }}</h3>
<ul class="product-price-list p-0">
    @if (isset($product) && $product->prices->count())
        @foreach($product->prices as $price)
            <li class="d-flex justify-content-between mb-2">
                <input type="hidden" name="prices[{{ $loop->iteration }}][id]" value="{{ $price->id }}">
                <input class="form-control mx-1" type="text" name="prices[{{ $loop->iteration }}][name]" value="{{ $price->name }}" placeholder="{{ __('Nazwa ceny') }}" required="required">
                <input class="form-control mx-1" type="text" name="prices[{{ $loop->iteration }}][value]" value="{{ $price->value }}" placeholder="{{ __('Wartość ceny') }}" required="required">
                <input class="form-control mx-1" type="text" name="prices[{{ $loop->iteration }}][unit]" value="{{ $price->unit }}" placeholder="{{ __('Jednostka ceny') }}" required="required">
                <a class="price-add btn btn-primary mx-1" href="#add" title="{{ __('Dodaj cenę') }}">{{ __('+') }}</a>
                <a class="price-delete btn btn-danger mx-1" href="#delete" title="{{ __('Usuń cenę') }}">{{ __('-') }}</a>
            </li>
        @endforeach
    @else
        <li class="d-flex justify-content-between mb-2">
            <input class="form-control mx-1" type="text" name="prices[1][name]" value="{{ old('prices')[1]['name'] }}" placeholder="{{ __('Nazwa ceny') }}" required="required">
            <input class="form-control mx-1" type="text" name="prices[1][value]" value="{{ old('prices')[1]['value'] }}" placeholder="{{ __('Wartość ceny') }}" required="required">
            <input class="form-control mx-1" type="text" name="prices[1][unit]" value="{{ old('prices')[1]['unit'] }}" placeholder="{{ __('Jednostka ceny') }}" required="required">
            <a class="price-add btn btn-primary mx-1" href="#add" title="{{ __('Dodaj cenę') }}">{{ __('+') }}</a>
            <a class="price-delete btn btn-danger mx-1" href="#delete" title="{{ __('Usuń cenę') }}">{{ __('-') }}</a>
        </li>
    @endif
</ul>
