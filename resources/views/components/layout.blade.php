<!doctype html>

<title>Brai Blog</title>
@vite('resources/css/app.css')
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <svg class="inline -mt-3.5" width="35" height="25" viewBox="0 0 40 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.9394 16.8531C16.33 17.2437 16.9631 17.2437 17.3538 16.8531L18.0606 
                            16.1462C18.4513 15.7556 18.4513 15.1225 18.0606 14.7319L15.8281 12.5L18.06 
                            10.2675C18.4506 9.87687 18.4506 9.24375 18.06 8.85312L17.3531 8.14625C16.9625 
                            7.75562 16.3294 7.75562 15.9388 8.14625L12.2925 11.7925C11.9019 12.1831 11.9019 
                            12.8163 12.2925 13.2069L15.9394 16.8531ZM21.94 16.1469L22.6469 16.8538C23.0375 
                            17.2444 23.6706 17.2444 24.0613 16.8538L27.7075 13.2075C28.0981 12.8169 28.0981 
                            12.1838 27.7075 11.7931L24.0613 8.14687C23.6706 7.75625 23.0375 7.75625 22.6469 
                            8.14687L21.94 8.85375C21.5494 9.24438 21.5494 9.8775 21.94 10.2681L24.1719 12.5L21.94 
                            14.7325C21.5494 15.1231 21.5494 15.7563 21.94 16.1469ZM39 26.5H23.8463C23.8 27.7381 22.9269 
                            28.5 21.8 28.5H18C16.8319 28.5 15.9362 27.4081 15.9519 26.5H1C0.45 26.5 0 26.95 0 27.5V28.5C0 
                            30.7 1.8 32.5 4 32.5H36C38.2 32.5 40 30.7 40 28.5V27.5C40 26.95 39.55 26.5 39 26.5ZM36 3.5C36 1.85 34.65 0.5 33 
                            0.5H7C5.35 0.5 4 1.85 4 3.5V24.5H36V3.5ZM32 20.5H8V4.5H32V20.5Z" fill="#3b82f6"/>
                    </svg>
                        
                    <span class="text-3xl">
                        <span class="font-semibold">Brai</span>.blog
                    </span>
                </a>
            </div>

            <div class="mt-8 flex items-center md:mt-0 space-x-5">
                <a href="/" class="font-bold uppercase">Home Page</a>
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="text-md font-bold">Hi, {{ auth()->user()->name }}</button>
                        </x-slot>

                        @can ('admin') 
                            <x-dropdown-item href="/admin/posts">All Posts</x-dropdown-item>
                            <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">New Post</x-dropdown-item>
                        @endcan
                        
                        <x-dropdown-item 
                            href="#" 
                            x-data="{}" 
                            @click.prevent="document.querySelector('#logout-form').submit()"
                        >
                            Logout
                        </x-dropdown-item>

                        <form id="logout-form" action="/logout" method="POST" style="display: none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </x-dropdown>
                @else
                    <a href="/login" class="font-bold text-blue-600">Login</a>
                    <a href="/register" class="font-bold text-blue-600">Register</a>
                @endauth

                <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

		{{ $slot }}

        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="newsletter_email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input 
                                id="newsletter_email" 
                                name="newsletter_email" 
                                type="text" 
                                placeholder="Your email address"
                                class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">

                        </div>
                        
                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
                <x-form.error name="newsletter_email" />
            </div>
        </footer>
    </section>

    @if (session()->has('success'))
        <div x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 4000)"
            x-show="show"
            class="fixed bottom-3 right-3 px-5 py-4 bg-blue-500 text-white rounded-sm"
        >
            {{ session('success') }}
        </div>
    @endif
</body>
