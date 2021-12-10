<x-admin-layout>
    <x-admin-header>
        Create Category
    </x-admin-header>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="mt-10 sm:mt-0">
            <div class="md:flex md:justify-center">
                <div class="mt-5 md:mt-0">
                    <form action="{{ route('admin.categories.store') }}" method="POST">
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
                                    <x-form.input name="name" class="sm:col-span-3"/>
                                    <x-form.input name="slug" class="sm:col-span-3"/>

                                    @if ($parents->count() > 0)
                                    <div class="col-span-6">
                                        <x-form.label name="parent_id"/>

                                        <select class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="parent_id" name="parent_id">
                                            <option value="0">Без категорії</option>
                                            @foreach($parents as $parent)
                                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @else
                                        <input type="hidden" value="0" name="parent_id">
                                    @endif

                                    <x-form.textarea name="description">
                                        {!! old('description') !!}
                                    </x-form.textarea>

                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                $("#description").trumbowyg({
                    lang: 'ua'
                });
            })
        </script>
    @endpush
</x-admin-layout>
