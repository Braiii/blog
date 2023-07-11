<x-layout> 
    <main class="max-w-lg mx-auto mt-10 lg:mt-20 space-y-6 bg-gray-100 p-10 rounded-xl border border-gray-200">
        <h1 class="font-bold text-xl text-center">Login !</h1>
        <form action="/sessions" method="POST">
            @csrf
            <x-form.inputs.text label="Email" type="email" name="email"/>
            <x-form.inputs.text label="Password" type="password" name="password"/>
            <x-form.button>Submit</x-form.button>
        </form>
    </main>
</x-layout> 
