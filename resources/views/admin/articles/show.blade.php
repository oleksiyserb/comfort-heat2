<x-admin-layout>
    <div class="bg-white">
        <div class="pt-6">
            <div class="max-w-2xl mx-auto px-4 flex items-center space-x-2 sm:px-6 lg:max-w-7xl lg:px-8">
                <h1 class="text-2xl font-extrabold">{{ $article->name }}</h1>
            </div>

            <!-- Image gallery -->
            <div class="mt-6 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8">
                <div
                    class="aspect-w-4 aspect-h-5 sm:rounded-lg sm:overflow-hidden lg:aspect-w-3 lg:aspect-h-4 relative">
                    <img src="{{ asset('storage/' . ($article->image ?? \App\Models\Article::NO_IMAGE)) }}"
                         alt="article 1" class="w-full h-full object-center object-cover">
                </div>
            </div>

            <!-- article info -->
            <div
                class="max-w-2xl mx-auto pt-10 pb-16 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:pb-24 lg:px-8 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
                <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                    <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
                        {{ $article->name }}
                    </h1>
                </div>

                <!-- Options -->
                <div class="mt-4 lg:mt-0 lg:row-span-3">
                    <h2 class="sr-only">Інформація про проєкт</h2>

                    <div class="mt-4">
                        <h3 class="text-sm text-gray-900 font-medium">
                            <b class="text-base">Автор:</b> {{ $article->author->name }}
                        </h3>

                        <h3 class="pt-4 text-sm text-gray-900 font-medium">
                            <b class="text-base">Статус:</b> {{ $article->isPublished() }}
                        </h3>

                        <h3 class="pt-4 text-sm text-gray-900 font-medium">
                            <b class="text-base">Створено:</b> {{ $article->created_at->diffForHumans() }}
                        </h3>

                        <h3 class="pt-4 text-sm text-gray-900 font-medium">
                            <b class="text-base">Редаговано:</b> {{ $article->updated_at->diffForHumans() }}
                        </h3>
                    </div>

                    <div class="mt-4 flex">
                        <a class="mr-4 font-bold text-white py-2 px-4 bg-blue-500 rounded-xl hover:bg-blue-600"
                           href="{{ url('admin/articles/'. $article->slug . '/edit') }}">
                            Редагувати
                        </a>
                        <form method="POST" action="{{ route('admin.articles.destroy', $article->id) }}">
                            @method('DELETE')
                            @csrf
                            <button class="font-bold text-white py-2 px-4 bg-red-500 rounded-xl hover:bg-red-600">
                                Видалити
                            </button>
                        </form>
                    </div>
                </div>

                <div class="py-10 lg:pt-6 lg:pb-16 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                    <!-- Description and details -->
                    <div>
                        <h3 class="text-sm mb-4 text-gray-900 font-black">Опис:</h3>

                        <div class="space-y-6">
                            {!! $article->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .upload-input > svg > path {
                -webkit-transition: fill 0.5s;
                -moz-transition: fill 0.5s;
                -ms-transition: fill 0.5s;
                -o-transition: fill 0.5s;
                transition: fill 0.5s;
            }

            .upload-input:hover > svg > path {
                fill: #FFFFFF;
            }
        </style>
    @endpush
</x-admin-layout>
