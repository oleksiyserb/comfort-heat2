<x-app-layout>
    <section class="news">
        <div class="container">
            <h2 class="title">Новини</h2>
            <div class="info">

                @foreach($articles as $article)
                @php
                    /* @var $article \App\Models\Article */
                @endphp

                    <div class="info__item news__item {{ $article->image ? 'news__picture' : '' }}">
                        @if ($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" alt="floor">
                        @endif
                        <h3>{{ $article->name }}</h3>
                        <p>{{ $article->excerpt }}</p>
                        <div class="info__button news__button">
                            <a href="{{ url('articles/' . $article->slug) }}">Читати<img src="/image/arrow-down.svg" alt="arrow"></a>
                        </div>
                    </div>
                @endforeach

            </div>
            {{ $articles->links() }}
        </div>
    </section>
</x-app-layout>
