@php
    /* @var $product \App\Models\Product */
@endphp
<x-app-layout>
	<!-- Product -->
	<section class="product">
		<div class="container">
			<div class="breadcrumbs">
				<p>{{ $product->name }}</p>
			</div>
			<div class="product__body">
				<div class="product__view">
					<div class="product__wrapper">
						<a href="#" class="product__image" id="static-image">
							<img src="{{ asset('storage/' . $product->getImage()->image) }}" alt="product-image">
						</a>
					</div>
					<div class="product__mini-wrapper">
                        @foreach($product->images()->get() as $image)
                            <div class="product__mini-image dynamic-image">
                                <img src="{{ asset('storage/' . $image->image) }}" alt="mini-image">
                            </div>
                        @endforeach
					</div>
				</div>
				<div class="product__info">
					<div class="product__top">
						<h2 class="title product__title">{{ $product->name }}</h2>
						<h2>{{ $product->formatPrice($product->price) }}</h2>
					</div>
					<div class="product__bottom">
						<p>Модель: {{ $product->model }}</p>
						<p>Виробник: {{ $product->manufacturer }}</p>
						<span class="{{ $product->status == 1 ? 'product__availability' : 'product__unavailable' }}">
                            {{ $product->getStatus() }}
                        </span>
					</div>
				</div>
			</div>
			<div class="product__description">
				<div class="product__buttons">
					<a id="description" class="active" href="#">Опис товару</a>
					<a id="technical" href="#">Технічні характеристики</a>
				</div>
				<div class="product__text">
					<p>{{ $product->body }}</p>
				</div>
				<div class="product__technical">
					<p>{{ $product->technical }}</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Product category -->
	<section class="product-category">
		<div class="container">
			<h3 class="title">Товари категорії</h3>
			<div class="result__wrapper product-category__wrapper">

                @foreach($products as $product)
				    <a href="{{ $product->slug }}" class="result__product-card">
					<img src="{{ asset('storage/' . $product->getImage()->image) }}" alt="product-image">
					<div class="result__description">
						<h4>{{ $product->name }}</h4>
						<p>{{ $product->excerpt }}</p>
					</div>
				</a>
                @endforeach

			</div>
		</div>
	</section>

	<!-- Script for images -->
	<script>
		let staticImage = document.getElementById('static-image');
		let dynamicImages = document.getElementsByClassName('dynamic-image');

		for (let i = 0; i < dynamicImages.length; i++) {
			dynamicImages[i].addEventListener("click", function() {
				let image = this.childNodes[1].getAttribute('src');
				let bigImage = staticImage.childNodes[1];

				staticImage.innerHTML = '<img src="' + image + '">';
			});
		}
	</script>
</x-app-layout>
