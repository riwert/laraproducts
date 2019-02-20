<div class="dates d-flex justify-content-between mb-3">
    <div class="created">
        {{ __('Dodano') }}: <strong>{{ $product->created_at->format('Y-m-d H:i:s') }}</strong>
    </div>
    <div class="updated">
        {{ __('Zaktualizowano') }}: <strong>{{ $product->updated_at->format('Y-m-d H:i:s') }}</strong>
    </div>
</div>
