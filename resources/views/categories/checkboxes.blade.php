<h3>{{ __('Kategorie') }}</h3>
@if (isset($categories) && $categories->count())
    <ul class="category-list p-0 form-group">
        @foreach ($categories as $category)
            <li class="form-check-inline">
                <input id="category-check-{{ $category->id }}" class="form-check-input" type="checkbox" name="categories[{{ $loop->iteration }}]" value="{{ $category->id }}"
                @if (isset($product) && in_array($category->id, $product->categories->map(function($category) { return $category->id; })->toArray()))
                    checked
                @endif>
                <label for="category-check-{{ $category->id }}" class="form-check-label">
                    {{ $category->name }}
                </label>
            </li>
        @endforeach
    </ul>
@endif
