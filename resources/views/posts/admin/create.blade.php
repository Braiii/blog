<x-layout>
    <x-setting heading="Publish New Post">
         <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf
            
            <x-form.input name="title" maxlength="60" />
            <x-form.input name="slug" />
            <x-form.input type="file" name="thumbnail" />
            <x-form.textarea name="excerpt">{{ old('excerpt') }}</x-form.textarea>
            <x-form.textarea name="body">{{ old('body') }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category"/>
            
                <select name="category_id" id="category_id" class="rounded-lg px-4 py-1">
                    @foreach ($categories as $category)
                        <option 
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucfirst($category->name) }}</option>
                    @endforeach
                </select>
            
                <x-form.error name="category" />
            </x-form.field>

            <x-form.button>Publish</x-form.button>
        </form> 
    </x-setting>
</x-layout>