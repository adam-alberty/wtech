<x-layouts.auth>
    <x-logo />

    <h1 class="text-2xl font-semibold mt-10 mb-10">Register an account</h1>

    <form action="" class="grid gap-2">
        <input type="text" placeholder="Email" class="p-3 rounded-xl border w-full">
        <div class="grid grid-cols-2 gap-2">
            <input type="text" placeholder="First name" class="p-3 rounded-xl border w-full">
            <input type="text" placeholder="Last name" class="p-3 rounded-xl border w-full">
        </div>
        <input type="password" placeholder="Password" class="p-3 rounded-xl border w-full">

        <p class="mt-3">Already have an account? <a href="/login" class="underline">Sign in here</a> and
            enjoy amazing deals!</p>

        <div class="flex justify-end mt-10">
            <div class="shrink-0 flex">
                <button type="submit"
                    class="bg-primary py-3 px-5 rounded-full text-primary-foreground font-semibold">Register</button>
            </div>
        </div>
    </form>
</x-layouts.auth>
