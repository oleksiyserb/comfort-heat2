<x-admin-layout>
    <div class="bg-white">
        <div class="pt-6">
            <div class="max-w-2xl mx-auto px-4 flex items-center space-x-2 sm:px-6 lg:max-w-7xl lg:px-8">
                <h1 class="text-2xl font-extrabold">{{ $product->name }}</h1>
            </div>

            <!-- Image gallery -->
            <div class="mt-6 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8">
                <div
                    class="aspect-w-4 aspect-h-5 sm:rounded-lg sm:overflow-hidden lg:aspect-w-3 lg:aspect-h-4 relative">
                    <img src="{{ asset($product->getImage() ? "storage/{$product->getImage()->image}" : \App\Models\Product::NO_IMAGE) }}"
                         alt="Product 1" class="w-full h-full object-center object-cover">

                    @if ($product->getImage())
                        <x-form.delete-image
                            :product="$product"
                            :action='url("admin/products/{$product->id}/images/{$product->getImage()->id}")'
                        />
                    @endif
                </div>

                @if(!$product->images->count() < 1)
                    <div class="@if($product->images->count() <= 7) lg:grid-cols-3 @else lg:grid-cols-5 @endif hidden lg:grid lg:gap-4">

                        @foreach($product->images->skip(1) as $picture)
                            <div class="relative aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
                                <img src="{{ asset('storage/' . $picture->image) }}"
                                     alt="Model wearing plain black basic tee."
                                     class="w-full h-full object-center object-cover">

                                @if ($product->getImage())
                                    <x-form.delete-image
                                        :product="$product"
                                        :action='url("admin/products/{$product->id}/images/{$picture->id}")'
                                    />
                                @endif
                            </div>
                        @endforeach

                    </div>
                @endif
            </div>

            <x-form.upload-button :action="url('admin/products/'.$product->slug.'/images')" />

            <!-- Product info -->
            <div
                class="max-w-2xl mx-auto pt-10 pb-16 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:pb-24 lg:px-8 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
                <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                    <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
                        {{ $product->name }}
                    </h1>
                </div>

                <!-- Options -->
                <div class="mt-4 lg:mt-0 lg:row-span-3">
                    <h2 class="sr-only">Інформація про продукт</h2>
                    <p class="text-3xl text-gray-900">{{ $product->price }}₴</p>

                    <div class="mt-4">
                        <h3 class="text-sm text-gray-900 font-medium">
                            <b class="text-base">Виробник:</b> {{ $product->manufacturer }}
                        </h3>

                        <h3 class="pt-4 text-sm text-gray-900 font-medium">
                            <b class="text-base">Модель:</b> {{ $product->model }}
                        </h3>

                        <h3 class="pt-4 text-sm text-gray-900 font-medium">
                            <b class="text-base">Статус:</b> {{ $product->getStatus() }}
                        </h3>

                        <h3 class="pt-4 text-sm text-gray-900 font-medium">
                            <b class="text-base">Створено:</b> {{ $product->created_at->diffForHumans() }}
                        </h3>

                        <h3 class="pt-4 text-sm text-gray-900 font-medium">
                            <b class="text-base">Редаговано:</b> {{ $product->updated_at->diffForHumans() }}
                        </h3>
                    </div>

                    <div class="mt-4 flex">
                        <a class="mr-4 font-bold text-white py-2 px-4 bg-blue-500 rounded-xl hover:bg-blue-600"
                           href="{{ url('admin/products/'. $product->slug . '/edit') }}">
                            Редагувати
                        </a>
                        <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}">
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
                            {!! $product->body !!}
                        </div>
                    </div>

                    <div class="mt-10">
                        <h3 class="text-sm mb-4 text-gray-900 font-black">Технічні характеристики:</h3>

                        <div class="space-y-6">
                            <p class="text-base text-gray-900">
                                {!! $product->technical !!}
                            </p>
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
