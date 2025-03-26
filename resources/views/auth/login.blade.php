<x-layouts.auth>
    <x-logo />

    <h1 class="text-2xl font-semibold mt-10 mb-10">Log in</h1>

    <form action="" class="grid gap-3">
        <x-input :label="'Email'" :id="'login-email'" :type="'email'" :name="'email'" :placeholder="'mail@example.com'" />
        <x-input :label="'Password'" :id="'login-password'" :type="'password'" :name="'password'" />

        <p class="mt-3">Don't have an account yet? <a href="/register" class="underline">Register here</a> and
            enjoy amazing deals!</p>

        <div class="flex justify-end mt-10">
            <div class="shrink-0 flex">
                <button type="submit" class="bg-primary py-3 px-5 rounded-full text-primary-foreground font-semibold">Log
                    in</button>
            </div>
        </div>
    </form>
</x-layouts.auth>
