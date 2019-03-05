<div class="dates d-md-flex justify-content-between mb-3">
    <div class="created">
        {{ __('Dodano') }}: <strong>{{ $category->created_at->format('Y-m-d H:i:s') }}</strong>
    </div>
    <div class="updated">
        {{ __('Zaktualizowano') }}: <strong>{{ $category->updated_at->format('Y-m-d H:i:s') }}</strong>
    </div>
</div>
