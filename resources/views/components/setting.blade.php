@props(['heading'])

<section class="px-6 py-8 max-w-4xl mx-auto">
    <h1 class="text-xl font-bold mb-8 pb-4 border-b">
        {{ $heading }}
    </h1>
    <div class="grid grid-cols-12 gap-4">
        <aside class="col-span-3">
            <ul class="space-y-2">
                <li>
                    <?xml version="1.0" ?>
                    <!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>
                    <a 
                        href="/admin/dashboard" 
                        class="transition-colors duration-200 block text-left hover:text-blue-500 border-r-4 hover:border-blue-500
                            {{ request()->is('admin/dashboard') ? 'border-blue-500 text-blue-500' : 'border-white' }}"
                    >
                        <x-icon name="home"></x-icon>
                        Dashboard
                    </a>
                </li>

                <li>
                    <a 
                        href="/admin/posts/create" 
                        class="transition-colors duration-200 block text-left hover:text-blue-500 border-r-4 hover:border-blue-500
                            {{ request()->is('admin/posts/create') ? 'border-blue-500 text-blue-500' : 'border-white' }}"
                    >
                        <x-icon name="create"/>
                        New Post
                    </a>
                </li>
            </ul>
        </aside>

        <main class="col-span-9">
            <x-panel>
                {{ $slot }}
             </x-panel>
        </main>
    </div>
</section>