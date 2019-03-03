@component('mail::message')
# {{ __('Zmiany w produkcie: ') }} {{ $product->name }}

{{ $product->description }}

### {{ __('Ceny') }}
@foreach($product->prices as $price)
 * {{ $price->name }} - {{ $price->value }} {{ $price->unit }}
@endforeach

@component('mail::button', ['url' => route('products.view', ['slug' => $product->slug])])
{{ __('Zobacz zmieniony produkt') }}
@endcomponent

## {{ __('Poprzednio: ') }} {{ $oldProduct->name }}

{{ $oldProduct->description }}

### {{ __('Ceny') }}
@foreach($oldProduct->prices as $oldPrice)
 * {{ $oldPrice->name }} - {{ $oldPrice->value }} {{ $oldPrice->unit }}
@endforeach

{{ __('Dzięki za zmianę w') }} {{ config('app.name') }}
@endcomponent
