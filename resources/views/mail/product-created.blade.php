@component('mail::message')
# {{ __('Dodano nowy produkt: ') }} {{ $product->name }}

{{ $product->description }}

### {{ __('Ceny') }}
@foreach($product->prices as $price)
 * {{ $price->name }} - {{ $price->value }} {{ $price->unit }}
@endforeach

@component('mail::button', ['url' => route('products.view', ['slug' => $product->slug])])
{{ __('Zobacz nowy produkt') }}
@endcomponent

{{ __('Dzięki za dodanie w') }} {{ config('app.name') }}
@endcomponent
