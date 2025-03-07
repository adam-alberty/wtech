<header class="px-8">
    <div class="mx-auto max-w-screen-2xl py-3 grid grid-cols-[1fr_auto_1fr] items-center">
        <a href="{{ route('home') }}">
            <img src="/assets/logo.png" alt="">
            <h1 class="sr-only">WTECH Eshop</h1>
        </a>

        <div class="shrink-0 grow w-full">
            <nav class="font-semibold flex gap-7">
                <a href="/men">Men</a>
                <a href="/men">Women</a>
                <a href="/men">Kids</a>

            </nav>
        </div>

        <div class="flex items-center gap-5 justify-self-end">
            @include('components.search')

            <nav class="flex items-center gap-3">
                <a href="/cart" class="p-2 rounded-full hover:bg-muted focus:bg-muted transition-all">
                    <x-phosphor-user class="w-6 h-6" />
                    <span class="sr-only">Go to my profile</span>
                </a>

                <a href="/cart" class="p-2 rounded-full hover:bg-muted focus:bg-muted transition-all">
                    <x-phosphor-shopping-bag-light class="w-7 h-7" />
                    <span class="sr-only">Go to shopping cart</span>
                </a>
            </nav>
        </div>
    </div>
</header>
