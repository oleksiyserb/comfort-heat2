<x-admin-layout>
    <x-admin-header>
        Edit Product: {{ $product->name }}
    </x-admin-header>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="mt-10 sm:mt-0">
            <div class="md:flex md:justify-center">
                <div class="mt-5 md:mt-0">
                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                @if($errors->any())
                                    <ul class="bg-red-100 p-4 mb-5 rounded-sm">
                                        @foreach($errors->all() as $error)
                                            <li class="text-red-500 text-xs">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <div class="grid grid-cols-6 gap-6">
                                    <x-form.input name="name" :value="old('name', $product->name)" class="sm:col-span-3" />
                                    <x-form.input name="slug" :value="old('slug', $product->slug)" class="sm:col-span-3" />
                                    <x-form.input name="price" :value="old('price', $product->price)" class="sm:col-span-3" />

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                                        <select id="category_id" name="category_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <x-form.input name="excerpt" :value="old('excerpt', $product->excerpt)" />
                                    <x-form.textarea name="body">
                                        {!! old('body', $product->body) !!}
                                    </x-form.textarea>
                                    <x-form.textarea name="technical">
                                        {!! old('technical', $product->technical) !!}
                                    </x-form.textarea>
                                    <x-form.input name="manufacturer" class="sm:col-span-3 lg:col-span-2" :value="old('manufacturer', $product->manufacturer)" />
                                    <x-form.input name="model" class="sm:col-span-3 lg:col-span-2" :value="old('model', $product->model)" />

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                        <select id="status" name="status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="1" {{ old('status') == $product->status ? 'selected' : '' }}>
                                                В наявності
                                            </option>
                                            <option value="0" {{ old('status') == $product->status ? 'selected' : '' }}>
                                                Немає на складі
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <x-form.button>
                                Save
                            </x-form.button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.min.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset("plugins/trumbowyg/trumbowyg.min.js") }}"></script>
        <script src="{{ asset("plugins/trumbowyg/langs/ua.min.js") }}"></script>
        <script>
            $(function () {
                $("#body").trumbowyg({
                    lang: 'ua'
                });
                $("#technical").trumbowyg({
                    lang: 'ua'
                });
            })
        </script>
    @endpush
</x-admin-layout>
