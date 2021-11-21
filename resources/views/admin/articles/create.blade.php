<x-admin-layout>
    <x-admin-header>
        Create Article
    </x-admin-header>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="mt-10 sm:mt-0">
            <div class="md:flex md:justify-center">
                <div class="mt-5 md:mt-0">
                    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
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

                                    <div class="pb-4">
                                        <x-form.label name="images"/>

                                        <label class="upload-input w-64 flex flex-col items-center px-4 py-6 bg-white rounded-md shadow-md tracking-wide uppercase border border-blue cursor-pointer hover:bg-purple-600 hover:text-white text-purple-600 ease-linear transition-all duration-150">
                                            <svg width="100" height="72" viewBox="0 0 100 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M87.3047 26.7188C87.3047 11.9624 74.8439 0 59.4727 0C48.9878 0 39.8571 5.56579 35.1115 13.7876C32.9516 12.6481 30.4706 12 27.832 12C19.4723 12 12.6953 18.5059 12.6953 26.5312C12.6953 26.7696 12.7013 27.0067 12.7131 27.2423C5.12557 31.3388 0 39.1417 0 48.0938C0 61.2968 11.1492 72 24.9023 72H43.75V48H31.25L50 24L68.75 48H56.25V72H75.0977C88.8508 72 100 61.2968 100 48.0938C100 39.1465 94.88 31.3473 87.2993 27.249C87.3029 27.0727 87.3047 26.8959 87.3047 26.7188Z" fill="#7C3AED"/>
                                            </svg>
                                            <span class="mt-2 font-bold text-base leading-normal">Change image</span>
                                            <input type="file" id="image" name="image" class="hidden">
                                        </label>
                                    </div>

                                    <x-form.input name="excerpt" />
                                    <x-form.textarea name="body">
                                        {!! old('body') !!}
                                    </x-form.textarea>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="is_published" class="block text-sm font-medium text-gray-700">Is published?</label>
                                        <input name="is_published" id="is_published" type="checkbox" value="1" @if(old('is_published') == 1) checked @endif>
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
