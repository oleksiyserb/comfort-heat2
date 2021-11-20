@props(['name'])

<div class="col-span-6">
    <x-form.label :name="$name" />

    <div class="mt-1">
        <textarea
            id="{{ $name }}"
            name="{{ $name }}"
            rows="3"
            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full
            sm:text-sm border border-gray-300 rounded-md"
        >
            {{ $slot ?? old($name) }}
        </textarea>
    </div>
</div>
