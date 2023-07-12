<x-layout>
    <section class="px-6 py-8 max-w-lg mx-auto">
        <h1 class="text-xl font-bold mb-6">
            Publish New Post
        </h1>
        <x-panel>
            <form action="/admin/posts" method="POST">
                @csrf
                
                <x-form.inputs.text label="Title" name="title" />
                <x-form.inputs.text label="Slug" name="slug" />
                
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="excerpt"
                    >
                        Excerpt
                    </label>
                    
                    <textarea class="border border-gray-400 p-2 w-full"
                        name="excerpt"
                        id="excerpt"
                        required
                    >{{ old('excerpt') }}</textarea>
                
                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-2">{{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="body"
                    >
                        Body
                    </label>
                
                    <textarea class="border border-gray-400 p-2 w-full"
                        name="body"
                        id="body"
                        required
                    >{{ old('body') }}</textarea>
                
                    @error('body')
                        <p class="text-red-500 text-xs mt-2">{{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="category_id"
                    >
                        Category
                    </label>
                
                    <select name="category_id" id="category_id" class="rounded-lg px-4 py-1">
                        @foreach ($categories as $category)
                            <option 
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >{{ ucfirst($category->name) }}</option>
                        @endforeach
                    </select>
                
                    @error('category_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }} </p>
                    @enderror
                </div>

                <x-form.submit-button>Publish</x-form.submit-button>
            </form>
        </x-panel>
    </section>
</x-layout>