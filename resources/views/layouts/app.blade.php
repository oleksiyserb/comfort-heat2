<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Comfort Heat</title>
    <!-- Icon -->
    <link rel="shortcut icon" href="/image/favicon.svg" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/media.css') }}">
</head>

<body id="body">

<!-- Catalog Start -->

<div class="catalog-modal" id="modal-menu">
    <div class="catalog-modal__block">
        <div class="container">
            <div class="catalog-modal__head">
                <h4>Каталог продукції</h4>
                <a id="modal-close" href="#"><img src="/image/close-catalog.svg" alt="close-catalog"></a>
                <a id="close-laptop" href="#"><img src="/image/close.svg" alt="close-laptop"></a>
            </div>

            @php
                /* @var $category \App\Models\Categories */

                $categories = \App\Models\Categories::all();

                $subcategories = $categories->filter(function ($item) {
                    return $item->parent_id > 0;
                })->values();
            @endphp

            <div class="catalog-modal__body">
                <div class="catalog-modal__left">

                    @foreach($categories as $category)
                        @if ($category->parent_id == 0)
                            <ul class="catalog-modal__item">
                                <a class="catalog-modal__first-button" href="{{ url('categories/' . $category->slug) }}">

                                    {{ $category->name }}

                                    <img src="/image/arrow-down-orange.svg" alt="arrow">
                                </a>

                                @foreach($subcategories as $subcategory)
                                    @if ($subcategory->parent_id == $category->id)
                                        <li><a href="{{ url('categories/' . $subcategory->slug) }}">{{ $subcategory->name }}</a></li>
                                    @endif
                                @endforeach

                            </ul>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Catalog End -->

<!-- Header -->
<div class="header__block">
    <header class="header">

        <!-- Burger Menu Start -->

        <div class="burger-menu" id="menu">
            <div class="burger-menu__header">
                <div class="container">
                    <a href="/"><img src="/image/white-logo.svg" alt="white-logo"></a>
                    <a href="#" id="burger-catalog" class="button-menu burger-menu__button">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12Z"
                                fill="#DB511F" />
                            <path d="M7 7H11M7 12H17M7 17H15" stroke="#FFFFFF" stroke-width="2"
                                  stroke-linecap="round" />
                        </svg>Каталог продукції
                    </a>
                    <a href="#" id="menu-close" class="burger-menu__close">
                        <img src="/image/close.svg" alt="close">
                    </a>
                </div>
            </div>
            <div class="burger-menu__body">
                <div class="container">
                    <div class="search-input">
                        <label for="search"><a href="#"><img src="/image/search-input.svg" alt="search"></a></label>
                        <input id="search" type="text">
                    </div>
                    <ul class="burger-menu__links">
                        <li><a href="{{ url('articles') }}">Новини</a></li>
                        <li><a href="{{ url('projects') }}">Проєкти</a></li>
                        <li><a href="{{ url('technical') }}">Технічна інформація</a></li>
                        <li><a href="{{ url('about') }}">Компанія</a></li>
                        <div class="burger-menu__social-media">
                            <a href="https://www.facebook.com/"><img src="/image/facebook-menu.svg" alt="facebook"></a>
                            <a href="https://www.instagram.com/"><img src="/image/instagram-menu.svg" alt="instagram"></a>
                            <a href="https://www.linkedin.com/"><img src="/image/in-menu.svg" alt="in"></a>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="burger-menu__footer">
                <div class="container">
                    <div class="burger-menu__left">
                        <a href="tel:+380967246400">
                            <img src="/image/kyivstar.svg" alt="kyivstar">+38 096 724 64 00
                        </a>
                        <a href="tel:+380997246400">
                            <img src="/image/vodafone.svg" alt="vodafone">+38 099 724 64 00
                        </a>
                    </div>
                    <ul class="burger-menu__right">
                        <li><a href="mailto:office@comfortheat.kiev.ua">office@comfortheat.kiev.ua</a></li>
                        <li>м. Київ, вул. В. Хвойки, 10, оф. 3</li>
                    </ul>
                </div>
                <div class="burger-menu__networks">
                    <a href="https://www.facebook.com/"><img src="/image/facebook-menu.svg" alt="facebook-menu"></a>
                    <a href="https://www.instagram.com/"><img src="/image/instagram-menu.svg" alt="instagram-menu"></a>
                    <a href="https://www.linkedin.com/"><img src="/image/in-menu.svg" alt="in-menu"></a>
                </div>
            </div>
        </div>

        <!-- Burger Menu End -->

        <div class="header__head">
            <a href="tel:+380967246400">
                <img src="/image/kyivstar.svg" alt="kyivstar">+38 096 724 64 00
            </a>
            <a href="tel:+380997246400">
                <img src="/image/vodafone.svg" alt="vodafone">+38 099 724 64 00
            </a>
        </div>
        <div class="header__body">
            <div class="container">
                <div class="header__info">
                    <div class="header__logo">
                        <a href="/"><img src="/image/logo.svg" alt="logo"></a>
                        <ul class="logo__list">
                            <li>Smart</li>
                            <li>Heating</li>
                            <li>Solutions</li>
                        </ul>
                    </div>
                    <div class="header__operators">
                        <a href="tel:+380967246400">
                            <img src="/image/kyivstar.svg" alt="kyivstar">+38 096 724 64 00
                        </a>
                        <a href="tel:+380997246400">
                            <img src="/image/vodafone.svg" alt="vodafone">+38 099 724 64 00
                        </a>
                    </div>
                    <ul class="header__contacts">
                        <li><a href="mailto:office@comfortheat.kiev.ua">office@comfortheat.kiev.ua</a></li>
                        <li>м. Київ, вул. В. Хвойки, 10, оф. 3</li>
                    </ul>
                    <a href="#" id="search-button" class="button-menu header__search">
                        <img src="/image/search-modal.svg" alt="search">
                        <p>Пошук</p>
                    </a>

                    <!-- Modal search -->

                    <div id="search-menu" class="search">
                        <form action="/search" class="search-input">
                            <input name="name" id="search" type="text" required>
                            <button type="submit" id="search-icon">
                                <img src="/image/search-input.svg" alt="search">
                            </button>
                        </form>
                    </div>

                    <!-- Modal search end -->

                    <a href="#" id="modal-laptop" class="button-menu header__button">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12Z"
                                fill="#DB511F" />
                            <path d="M7 7H11M7 12H17M7 17H15" stroke="#FFFFFF" stroke-width="2"
                                  stroke-linecap="round" />
                        </svg>Каталог продукції
                    </a>
                    <a href="#" id="burger-menu" class="button-menu header__menu">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12Z"
                                fill="#BDE3FB" />
                            <path d="M7 7H11M7 12H17M7 17H15" stroke="#00407A" stroke-width="2"
                                  stroke-linecap="round" />
                        </svg>
                        <p>Меню</p>
                    </a>
                </div>
            </div>
        </div>
    </header>
</div>

{{ $slot }}

<!-- Partner -->
<section class="partner">
    <div class="container">
        <div class="partner__block">
            <h2>Професійне співробітництво</h2>
            <p>Досвід Comfort Heat та високі стандарти компанії є міцною основою в реалізації проектів будь-якої
                складності.</p>
            <div class="info__button partner__block-info margin--left">
                <a href="{{ url('projects') }}">Більше проектів<img src="/image/arrow-down-light.svg" alt="arrow"></a>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="footer__wrapper">
        <div class="footer__body">
            <div class="container">
                <div class="footer__logo">
                    <a href="/"><img src="/image/white-logo.svg" alt="white-logo"></a>
                </div>
                <div class="footer__contacts">
                    <h3>Контакти</h3>
                    <p>м. Київ, вул. В. Хвойки, 10, оф. 3</p>
                    <ul class="footer__operators">
                        <li>
                            <a href="tel:+380997246400"><img src="/image/kyivstar.svg" alt="kyivstar">+38 099 724 64
                                00</a>
                        </li>
                        <li>
                            <a href="tel:+380967246400"><img src="/image/vodafone.svg" alt="vodafone">+38 096 724 64
                                00</a>
                        </li>
                        <li>
                            <a href="tel:+380937246400"><img src="/image/lifecell.svg" alt="lifecell">+38 093 724 64
                                00</a>
                        </li>
                    </ul>
                    <p><a href="mailto:office@comfortheat.kiev.ua">office@comfortheat.kiev.ua</a></p>
                    <div class="footer__social-media">
                        <a href="#">
                            <img src="/image/facebook.svg" alt="facebook">
                        </a>
                        <a href="#">
                            <img src="/image/instagram.svg" alt="instagram">
                        </a>
                        <a href="#">
                            <img src="/image/in.svg" alt="in">
                        </a>
                    </div>
                </div>
                <div class="footer__menu">
                    <a href="{{ url('articles') }}">Новини</a>
                    <a href="{{ url('projects') }}">Проєкти</a>
                    <a href="{{ url('technical') }}">Технічна інформація</a>
                    <a href="{{ url('about') }}">Компанія</a>
                </div>
            </div>
        </div>
        <div class="footer__map">
            <img src="/image/map.svg" alt="map">
        </div>
    </div>
    <div class="container">
        <div class="footer__end">
            <p>© Comfort Heat - офіційний дистриб'ютор</p>
            <div class="footer__development">
                <img src="/image/ingsot.svg" alt="ingsot">Розроблено в Ingsot
            </div>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/modal.js') }}"></script>
<script src="{{ asset('js/sort-products.js') }}"></script>
</body>

</html>
