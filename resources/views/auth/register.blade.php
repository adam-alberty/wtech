<x-layouts.auth>
    <x-logo />

    <h1 class="text-2xl font-semibold mt-10 mb-10">Register an account</h1>

    <form action="" class="grid gap-3">
        <x-input :label="'Email'" :id="'register-email'" :type="'email'" :name="'email'" :placeholder="'mail@example.com'" />
        <div class="grid grid-cols-2 gap-3">
            <x-input :label="'First name'" :id="'register-first_name'" :name="'first_name'" :placeholder="'John'" />
            <x-input :label="'Last name'" :id="'register-last_name'" :name="'last_name'" :placeholder="'Smith'" />
        </div>
        <x-input :label="'Password'" :id="'register-password'" :type="'password'" :name="'password'" />
        <x-input :label="'Repeat Password'" :id="'register-password-again'" :type="'password'" :name="'password-again'" />


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
