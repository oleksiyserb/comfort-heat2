<x-app-layout>
    <!-- Search results -->
    <section class="search-params">
        <div class="container">
            <p class="search-params__paragraf">Параметри пошуку</p>
            <form action="/search" method="GET">
                <div class="search-params__form">
                    <div class="search-params__input">
                        <input name="name" type="text" value="{{ request('name') }}">
                        <label class="search-params__radio" for="search-description">
                            <input
                                name="body"
                                type="checkbox"
                                id="search-description"
                                {{ request()->has('body') ? 'checked' : '' }}
                            >
                            <span>Шукати в описі товару</span>
                        </label>
                    </div>
                    <div class="search-params__input">
                        <select name="category" id="select-categories">
                            <option value="0">Усі категорії</option>
                            @foreach($categories as $category)
                                @if($category->parent_id > 0)
                                    <option
                                        value="{{ $category->slug }}"
                                        {{ $category->slug == request('category') ? 'selected' : '' }}
                                    >
                                        {{ $category->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        <span></span>
                    </div>
                </div>
                <button class="search-params__button">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="12" fill="#FFFFFF" />
                        <circle cx="12" cy="12" r="5" stroke="#00407A" stroke-width="2" />
                        <path d="M16 16L18 18" stroke="#00407A" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    <span>Шукати</span>
                </button>
            </form>
        </div>
    </section>

    <!-- Result-->
    <section class="result">
        <div class="container">
            <div class="result__title">
                <p>Результат пошуку:</p>
                <h3>{{ request('name') }}</h3>
            </div>

            @unless($products->count() < 1)
            <div class="result__instruments">
                <div class="result__sort">
                    <a href="#" id="sort-list">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                    <x-product-card :product="$product" />
                @endforeach

            </div>
            {{ $products->links() }}
            @else
                <h4>Нічого не знайдено</h4>
            @endif
        </div>
    </section>
</x-app-layout>
