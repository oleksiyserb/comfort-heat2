<x-app-layout>
    <section class="article">
        <div class="container">
            <div class="breadcrumbs">
                <a href="{{ url('articles') }}">Новини</a> > <p>Переваги електричної теплої підлоги</p>
            </div>
            <div class="article__content">
                <h1 class="title article__title">{{ $article->name }}</h1>
                <div class="article__image">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="floor">
                </div>
                <div class="article__content">
                    <p>{{ $article->body }}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="propositions">
        <div class="container">
            <h4 class="title">Пов’язані статті</h4>
            <div class="info">

                @foreach($recommend as $article)
                <div class="info__item news__item {{ $article->image ? 'news__picture' : '' }}">
                    @if ($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="hotel">
                    @endif

                    <h3>{{ $article->name }}</h3>
                    <p>{{ $article->excerpt }}</p>
                    <div class="info__button propositions__button">
                        <a href="{{ url('articles/' . $article->slug) }}">
                            Читати
                            <img src="/image/arrow-down.svg" alt="arrow">
                        </a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
</x-app-layout>
