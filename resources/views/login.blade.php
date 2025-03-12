<x-layouts.auth>

    <div class="max-w-md mx-auto py-10">
        <x-logo />

        <h1 class="text-2xl font-semibold mt-10 mb-10">Log in</h1>

        <form action="" class="grid gap-2">
            <input type="text" placeholder="Email" class="p-3 rounded-xl border w-full">
            <input type="password" placeholder="Password" class="p-3 rounded-xl border w-full">

            <p class="mt-3">Don't have an account yet? <a href="/register" class="underline">Register here</a> and
                enjoy amazing deals!</p>

            <div class="flex justify-end mt-10">
                <div class="shrink-0 flex">
                    <button type="submit"
                        class="bg-primary py-3 px-5 rounded-full text-primary-foreground font-semibold">Log
                        in</button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.auth>
