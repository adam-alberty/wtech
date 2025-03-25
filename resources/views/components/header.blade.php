<header class="px-8 sticky top-0 z-10 bg-background border-gray-200">
    <div class="mx-auto max-w-screen-3xl py-3 grid grid-cols-[1fr_auto_1fr] items-center">
        <a href="{{ route('home') }}" class="w-[200px]">
            <img src="/assets/logo.png" alt="">
            <h1 class="sr-only">WTECH Eshop</h1>
        </a>

        <div class="shrink-0 grow w-full">
            <nav class="font-semibold flex group">
                <a href="/c/featured"
                    class="group-hover:text-gray-500 hover:text-black underline-offset-8 decoration-1 px-5 py-2 transition-colors">New
                    &
                    Featured</a>
                <a href="/c/men"
                    class="group-hover:text-gray-500 hover:text-black underline-offset-8 decoration-1 px-5 py-2 transition-colors">Men</a>
                <a href="/c/women"
                    class="group-hover:text-gray-500 hover:text-black underline-offset-8 decoration-1 px-5 py-2 transition-colors">Women</a>
                <a href="/c/kids"
                    class="group-hover:text-gray-500 hover:text-black underline-offset-8 decoration-1 px-5 py-2 transition-colors">Kids</a>
            </nav>
        </div>

        <div class="flex items-center gap-5 justify-self-end">
            @include('components.search')

            <nav class="flex items-center gap-3">
                <a href="/login" class="p-2 rounded-full hover:bg-input focus:bg-input">
                    <x-phosphor-user class="w-5 h-5" />
                    <span class="sr-only">Go to my profile</span>
                </a>

                <a href="{{ route('checkout') }}" class="p-2 rounded-full hover:bg-input focus:bg-input">
                    <x-phosphor-shopping-bag-light class="w-6 h-6" />
                    <span class="sr-only">Go to shopping cart</span>
                </a>
            </nav>
        </div>
    </div>
</header>
