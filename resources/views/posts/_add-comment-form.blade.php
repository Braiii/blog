<form action="/posts/{{ $post->slug }}/comments" method="POST">
    @csrf

    <header class="flex items-center">
        <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" class="rounded-sm" alt="profile image">

        <h2 class="ml-4">Want to participate?</h2>
    </header>

    <div class="mt-6">
        <textarea 
            name="body" 
            class="w-full focus:outline-none focus:ring @error('body') border border-red-500 @enderror" 
            id="body" 
            rows="5" 
            required
            placeholder="Quick, thnink of something to say!"></textarea>

        @error('body')
            <p class="text-red-500 text-xs mt-2">{{ $message }} </p>
        @enderror
    </div>

    <footer class="flex justify-end border-t border-gray-200 mt-6 pt-6">
        <x-form.submit-button>Post</x-form.submit-button>
    </footer>
</form>