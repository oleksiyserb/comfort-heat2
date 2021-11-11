@props(['name'])

<div {{ $attributes(['class' => 'col-span-6']) }}>
    <x-form.label :name="$name" />

    <input
        type="text"
        name="{{ $name }}"
        id="{{ $name }}"
        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full
        shadow-sm sm:text-sm border-gray-300 rounded-md"
        {{ $attributes(['value' => old($name)]) }}
    >
</div>
