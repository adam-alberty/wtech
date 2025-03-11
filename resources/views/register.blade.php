<x-layouts.auth>
    <div class="max-w-md mx-auto py-10">
        <img src="/assets/logo.png" class="mb-10" alt="">

        <h1 class="text-2xl font-semibold mb-10">Register and get deals!</h1>

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
    </div>
</x-layouts.auth>
