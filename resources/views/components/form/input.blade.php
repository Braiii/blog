@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <input class="border p-2 w-full rounded
        @error($name) 
            border-red-400 
        @else 
            border-gray-200 
        @enderror"
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $attributes(['required' => 'true', 'type' => 'text', 'value' => old($name)]) }}
    >

    <x-form.error name="{{ $name }}" />
</x-form.field>
