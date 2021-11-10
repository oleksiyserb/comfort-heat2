@props(['name'])

<label
    for="{{ $name }}"
    class="block text-sm font-medium text-gray-700"
>{{ ucfirst($name) }}</label>
