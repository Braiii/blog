@props(['comment'])

<x-panel class="bg-gray-50">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{ $comment->user_id }}" class="rounded-sm" alt="image" width="60" height="60">
        </div>
    
        <div>
            <header class="mb-2">
                <h3 class="font-bold">{{ $comment->author->name }}</h3>
                <p class="text-sm text-gray-400 italic">Posted 
                    <time class="font-light">{{ $comment->created_at->diffForHumans() }}</time>
                </p>
            </header>
    
            <p>
               {{ $comment->body }}
            </p>
        </div>
    </article>
</x-panel>