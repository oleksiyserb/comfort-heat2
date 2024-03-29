<x-admin-layout>
    <x-admin-header>
        Articles List
    </x-admin-header>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <a href="{{ url('admin/articles/create') }}" class="my-5 inline-block bg-green-500 px-4 py-1.5 text-white rounded-xl">
            Create
        </a>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Image
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Title
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Is Published
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">

                            @foreach($articles as $article)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 object-cover"
                                                     src="{{ asset($article->image ? "storage/{$article->image}" : \App\Models\Article::NO_IMAGE) }}"
                                                     alt="project-image">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ url('admin/articles/' . $article->slug) }}" class="text-sm text-gray-900">
                                            {{ $article->name }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                <span class="{{ $article->is_published == 1 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                                  {{ $article->isPublished() }}
                                </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ url('admin/articles/' . $article->slug) }}" class="text-indigo-600 hover:text-indigo-900 mx-2">Show</a>
                                        <a href="{{ url("admin/articles/{$article->slug}/edit") }}" class="text-indigo-600 hover:text-indigo-900 mx-2">Edit</a>
                                        <form class="inline-block" method="POST" action="{{ route('admin.articles.destroy', $article->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button class="text-indigo-600 hover:text-indigo-900 mx-2">
                                                Destroy
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10">
            {{ $articles->links() }}
        </div>
    </div>
</x-admin-layout>
