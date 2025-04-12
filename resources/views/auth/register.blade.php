<x-layouts.auth>
    <x-logo />

    <h1 class="text-2xl font-semibold mt-10 mb-10">Register an account</h1>

    @if (session('success'))
        <div class="text-green-600 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('register.post') }}" method="POST" class="grid gap-3">
        @csrf

        <x-input
            :label="'Email'"
            :id="'register-email'"
            :type="'email'"
            :name="'email'"
            :placeholder="'mail@example.com'"
            :value="old('email')"
        />
        @error('email')
        <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror

        <div class="grid grid-cols-2 gap-3">
            <div>
                <x-input
                    :label="'First name'"
                    :id="'register-first_name'"
                    :name="'first_name'"
                    :placeholder="'John'"
                    :value="old('first_name')"
                />
                @error('first_name')
                <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <x-input
                    :label="'Last name'"
                    :id="'register-last_name'"
                    :name="'last_name'"
                    :placeholder="'Smith'"
                    :value="old('last_name')"
                />
                @error('last_name')
                <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <x-input
            :label="'Password'"
            :id="'register-password'"
            :type="'password'"
            :name="'password'"
        />
        @error('password')
        <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror

        <x-input
            :label="'Repeat Password'"
            :id="'register-password-again'"
            :type="'password'"
            :name="'password_confirmation'"
        />
        @error('password_confirmation')
        <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror

        <p class="mt-3">
            Already have an account? <a href="{{ route('login') }}" class="underline">Sign in here</a> and
            enjoy amazing deals!
        </p>

        <div class="flex justify-end mt-10">
            <div class="shrink-0 flex">
                <button type="submit" class="bg-primary py-3 px-5 rounded-full text-primary-foreground font-semibold">
                    Register
                </button>
            </div>
        </div>
    </form>
</x-layouts.auth>
