@props([
    'type' => 'text',
    'label', 
    'name',
    'value',
])

<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
        for="{{ $name }}"
    >
        {{ $label }}
    </label>

    <input class="border p-2 w-full
        @error($name) 
            border-red-400 
        @else 
            border-gray-400 
        @enderror"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name) }}"
        required
    >

    <x-form.error name="{{ $name }}" />
</div>
