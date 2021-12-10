@php
    /* @var $category \App\Models\Categories */
    /* @var $parent \App\Models\Categories */
    /* @var $subcategory \App\Models\Categories */
    /* @var $product \App\Models\Product */
@endphp

<x-app-layout>
	<div class="container container__wrapper">
		<!-- Aside -->
		<aside class="category">

            @foreach($parentCategories as $parent)
			    <div class="category__item">
                    <a href="#" class="dropdown-btn">{{ $parent->name }}</a>
                    <ul>

                        @foreach($subcategories as $subcategory)
                            @if ($subcategory->parent_id == $parent->id)
                                <li>
                                    <a href="{{ url('categories/' . $subcategory->slug) }}">
                                        {{ $subcategory->name }}
                                    </a>
                                </li>
                            @endif
                        @endforeach

                    </ul>
			    </div>
            @endforeach

		</aside>

		<main class="product-information">
			<!-- Subcategory -->
			<section class="subcategory">
				<h2 class="title">{{ $category->name }}</h2>
				<p>{!! $category->description !!}</p>
			</section>

			<!-- Result-->
            @unless($products->count() < 1)
                <section class="result">
                    <div class="result__instruments">
                        <div class="result__sort">
                            <a href="#" id="sort-list">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M0 8C0 3.58172 3.58172 0 8 0H32C36.4183 0 40 3.58172 40 8V32C40 36.4183 36.4183 40 32 40H8C3.58172 40 0 36.4183 0 32V8Z"
                                            fill="white" />
                                    <rect x="16" y="26" width="16" height="4" rx="1" fill="#BDE3FB" />
                                    <rect x="16" y="18" width="16" height="4" rx="1" fill="#BDE3FB" />
                                    <rect x="8" y="26" width="4" height="4" rx="1" fill="#BDE3FB" />
                                    <rect x="8" y="18" width="4" height="4" rx="1" fill="#BDE3FB" />
                                    <rect x="16" y="10" width="16" height="4" rx="1" fill="#BDE3FB" />
                                    <rect x="8" y="10" width="4" height="4" rx="1" fill="#BDE3FB" />
                                    <path
                                            d="M8 1H32V-1H8V1ZM39 8V32H41V8H39ZM32 39H8V41H32V39ZM1 32V8H-1V32H1ZM8 39C4.13401 39 1 35.866 1 32H-1C-1 36.9706 3.02944 41 8 41V39ZM39 32C39 35.866 35.866 39 32 39V41C36.9706 41 41 36.9706 41 32H39ZM32 1C35.866 1 39 4.13401 39 8H41C41 3.02944 36.9706 -1 32 -1V1ZM8 -1C3.02944 -1 -1 3.02944 -1 8H1C1 4.13401 4.13401 1 8 1V-1Z"
                                            fill="#BDE3FB" />
                                </svg>
                            </a>
                            <a href="#" class="active" id="sort-table">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M0 8C0 3.58172 3.58172 0 8 0H32C36.4183 0 40 3.58172 40 8V32C40 36.4183 36.4183 40 32 40H8C3.58172 40 0 36.4183 0 32V8Z"
                                            fill="white" />
                                    <rect x="8" y="26" width="4" height="4" rx="1" fill="#BDE3FB" />
                                    <rect x="28" y="26" width="4" height="4" rx="1" fill="#BDE3FB" />
                                    <rect x="18" y="26" width="4" height="4" rx="1" fill="#BDE3FB" />
                                    <rect x="8" y="18" width="4" height="4" rx="1" fill="#BDE3FB" />
                                    <rect x="28" y="18" width="4" height="4" rx="1" fill="#BDE3FB" />
                                    <rect x="18" y="18" width="4" height="4" rx="1" fill="#BDE3FB" />
                                    <rect x="8" y="10" width="4" height="4" rx="1" fill="#BDE3FB" />
                                    <rect x="28" y="10" width="4" height="4" rx="1" fill="#BDE3FB" />
                                    <rect x="18" y="10" width="4" height="4" rx="1" fill="#BDE3FB" />
                                    <path
                                            d="M8 1H32V-1H8V1ZM39 8V32H41V8H39ZM32 39H8V41H32V39ZM1 32V8H-1V32H1ZM8 39C4.13401 39 1 35.866 1 32H-1C-1 36.9706 3.02944 41 8 41V39ZM39 32C39 35.866 35.866 39 32 39V41C36.9706 41 41 36.9706 41 32H39ZM32 1C35.866 1 39 4.13401 39 8H41C41 3.02944 36.9706 -1 32 -1V1ZM8 -1C3.02944 -1 -1 3.02944 -1 8H1C1 4.13401 4.13401 1 8 1V-1Z"
                                            fill="#BDE3FB" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="result__wrapper">
                        @foreach($products as $product)
                            <a href="{{ url('products/' . $product->slug) }}" class="result__product-card">
                            <img src="{{ asset('storage/'. $product->getImage()->image) }}" alt="product-image">
                            <div class="result__description">
                                <h4>{{ $product->name }}</h4>
                                <span>{{ $product->price }}&nbsp;₴</span>
                                <p>
                                    {{ $product->excerpt }}
                                </p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    {{ $products->links() }}
                </section>
            @else
                <p>На жаль нічого не знайдено.</p>
            @endunless
		</main>
	</div>

	<!-- Propositions -->
	<section class="propositions category-propositions">
		<div class="container">
			<div class="info">

                @foreach($projects as $project)
                    <x-project-item :project="$project" class="{{ $project->image ? 'project__picture' : '' }}" />
                @endforeach

			</div>
		</div>
	</section>
</x-app-layout>
