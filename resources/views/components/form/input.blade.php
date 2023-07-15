@props(['name', 'type' => 'text'])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <input class="border p-2 w-full rounded
        @error($name) 
            border-red-400 
        @else 
            border-gray-200 
        @enderror"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name) }}"
        required
    >

    <x-form.error name="{{ $name }}" />
</x-form.field>