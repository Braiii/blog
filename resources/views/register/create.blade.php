<x-layout> 
    <main class="max-w-lg mx-auto mt-10 lg:mt-20 space-y-6">
        <x-panel>
            <h1 class="font-bold text-xl text-center">Register !</h1>
            <form action="/register" method="POST">
                @csrf
                <x-form.input name="username"/>
                <x-form.input name="name"/>
                <x-form.input type="email" name="email"/>
                <x-form.input type="password" name="password"/>
                <x-form.input type="password" name="password_confirmation"/>
                <x-form.button>Register</x-form.button>
            </form>
        </x-panel>
    </main>
</x-layout> 
