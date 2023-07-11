<!doctype html>

<title>Laravel From Scratch Blog</title>
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
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 space-x-3 text-sm">
                <a href="/" class="font-bold uppercase">Home Page</a>
                @auth
                    <span class="font-bold text-blue-600">Hi, {{ auth()->user()->username }}</span>
                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-400">Logout</button>
                    </form>
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
