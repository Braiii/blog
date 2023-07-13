@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}" />
    
    <textarea class="border p-2 w-full
        @error($name) 
            border-red-500 
        @else
            border-gray-400
        @enderror"
        name="{{ $name }}"
        id="{{ $name }}"
        required
    >{{ old($name) }}</textarea>

    <x-form.error name="{{ $name }}"/>
</x-form.field>