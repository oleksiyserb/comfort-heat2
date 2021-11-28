@props(['product'])

<a href="{{ url('products/' . $product->slug) }}" class="result__product-card">
    <img src="{{ asset($product->getImage() ? "storage/{$product->getImage()->image}" : \App\Models\Product::NO_IMAGE) }}" alt="product-image">
    <div class="result__description">
        <h4>{{ $product->name }}</h4>
        <p>{{ $product->excerpt }}</p>
    </div>
</a>
