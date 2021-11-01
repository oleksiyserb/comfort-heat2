@props(['product'])

<a href="{{ url('products/' . $product->slug) }}" class="result__product-card">
    <img src="{{ asset('storage/' . $product->getImage()) }}" alt="product-image">
    <div class="result__description">
        <h4>{{ $product->name }}</h4>
        <p>{{ $product->excerpt }}</p>
    </div>
</a>
