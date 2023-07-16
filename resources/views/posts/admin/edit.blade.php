<x-layout>
    <x-setting :heading="'Edit post' . $post->title">
         <form action="/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
            <x-form.input name="title" value="{{ old('title', $post->title) }}" />
            <x-form.input name="slug" value="{{ old('slug', $post->slug) }}" />
            <x-form.input type="file" name="thumbnail" :required="false" />
            <x-form.textarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body">{{ old('body', $post->body) }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category"/>
            
                <select name="category_id" id="category_id" class="rounded-lg px-4 py-1">
                    @foreach ($categories as $category)
                        <option 
                            value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                        >{{ ucfirst($category->name) }}</option>
                    @endforeach
                </select>
            
                <x-form.error name="category" />
            </x-form.field>

            <x-form.button>Publish</x-form.button>
        </form> 
    </x-setting>
</x-layout>