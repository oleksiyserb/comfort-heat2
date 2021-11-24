<x-admin-layout>
    <x-admin-header>
        Users List
    </x-admin-header>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <a href="{{ url('admin/users/create') }}" class="my-5 inline-block bg-green-500 px-4 py-1.5 text-white rounded-xl">
            Create
        </a>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Created At
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Updated At
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">

                            @foreach($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img src="https://i.pravatar.cc/60?u={{ $user->id }}" alt="" width="40" height="40" class="rounded-full">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $user->name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $user->email }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $user->created_at->diffForHumans() }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $user->updated_at->diffForHumans() }}
                                </td>
                                @if($user->name != auth()->user()->name)
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <form class="inline-block" method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="text-indigo-600 hover:text-indigo-900 mx-2">
                                            Destroy
                                        </button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10">
            {{ $users->links() }}
        </div>
    </div>
</x-admin-layout>
