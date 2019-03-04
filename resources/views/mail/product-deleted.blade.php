@component('mail::message')
# {{ __('Usunięto produkt: ') }} {{ $product->name }}

{{ $product->description }}

### {{ __('Ceny') }}
@foreach($product->prices as $price)
 * {{ $price->name }} - {{ $price->value }} {{ $price->unit }}
@endforeach

{{ __('Dzięki za utrzymanie porządku w') }} {{ config('app.name') }}
@endcomponent
