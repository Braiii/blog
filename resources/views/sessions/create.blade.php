<x-layout> 
    <main class="max-w-lg mx-auto mt-10 lg:mt-20 space-y-6 bg-gray-100 p-10 rounded-xl border border-gray-200">
        <h1 class="font-bold text-xl text-center">Login !</h1>
        <form action="/sessions" method="POST">
            @csrf
            <x-form.input type="email" name="email"/>
            <x-form.input type="password" name="password"/>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                Login
            </button>
        </form>
    </main>
</x-layout> 
