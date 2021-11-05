<x-admin-layout>
    <x-admin-header>
        Admin Panel
    </x-admin-header>
    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 grid sm:grid-cols-3 xs:grid-cols-2 gap-5">
            <div class="text-center border border-2 border-gray-200 rounded-xl shadow bg-white">
                <h1 class="text-lg font-bold m-3">На сайт</h1>
                <hr>
                <a href="{{ url('/') }}" class="m-3 block font-bold hover:text-blue-400 focus:outline-none">Перейти</a>
            </div>
            <div class="text-center border border-2 border-gray-200 rounded-xl shadow bg-white">
                <h1 class="text-lg font-bold m-3">Керування продуктами</h1>
                <hr>
                <a href="{{ url('admin/products') }}" class="m-3 block font-bold hover:text-blue-400 focus:outline-none">Перейти</a>
            </div>
            <div class="text-center border border-2 border-gray-200 rounded-xl shadow bg-white">
                <h1 class="text-lg font-bold m-3">Керування проєктами</h1>
                <hr>
                <a href="{{ url('admin/projects') }}" class="m-3 block font-bold hover:text-blue-400 focus:outline-none">Перейти</a>
            </div>
        </div>
    </main>
</x-admin-layout>
