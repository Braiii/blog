<x-layout>
    <x-setting heading="Manage Posts">
        @if ($posts->count() > 1)
            <div class="flex flex-col overflow-x-auto mb-6">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-left text-sm font-light">
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <img src="{{ asset('storage/'. $post->thumbnail) }}" width="100" alt="Post illustration" class="rounded-xl">
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <a href="/posts/{{ $post->slug }}" class="block mb-2">
                                                            {{ $post->title }}
                                                        </a>
                                                        
                                                        <x-category-button :category="$post->category" />
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form method="POST" action="/admin/posts/{{ $post->id }}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="text-xs text-red-400">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{ $posts->links() }}
        @else
            <p class="text-center">No posts yet.</p>
        @endif
    </x-setting>
</x-layout>

