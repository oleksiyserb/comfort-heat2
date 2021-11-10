<x-admin-layout>
    <x-admin-header>
        Create Product
    </x-admin-header>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="mt-10 sm:mt-0">
            <div class="md:flex md:justify-center">
                <div class="mt-5 md:mt-0">
                    <form action="{{ route('admin.products.store') }}" method="POST">
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
                                    <x-form.input name="name" class="sm:col-span-3" />
                                    <x-form.input name="slug" class="sm:col-span-3" />
                                    <x-form.input name="price" class="sm:col-span-3" />

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                                        <select id="category_id" name="category_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <x-form.input name="excerpt" />
                                    <x-form.textarea name="body" />
                                    <x-form.textarea name="technical" />
                                    <x-form.input name="manufacturer" class="sm:col-span-3 lg:col-span-2" />
                                    <x-form.input name="model" class="sm:col-span-3 lg:col-span-2" />

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                        <select id="status" name="status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>В наявності</option>
                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Немає на складі</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save
                                </button>
                            </div>
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
