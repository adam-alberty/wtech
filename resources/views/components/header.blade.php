<header class="px-8 sticky left-0 right-0 top-0 z-10 bg-background border-gray-200">
    <div class="mx-auto max-w-screen-3xl py-3 grid grid-cols-2 lg:grid-cols-[1fr_auto_1fr] items-center">
        <div class="shrink-0">
            <x-logo />
        </div>

        <div class="hidden lg:block shrink-0 grow w-full">
            <nav class="font-medium flex group">
                <a href="{{ route('category', 'featured') }}"
                    class="group-hover:text-gray-500 hover:text-black underline-offset-8 decoration-1 px-5 py-2 transition-colors">New
                    &
                    Featured</a>
                <a href="{{ route('category', 'men') }}"
                    class="group-hover:text-gray-500 hover:text-black underline-offset-8 decoration-1 px-5 py-2 transition-colors">Men</a>
                <a href="{{ route('category', 'women') }}"
                    class="group-hover:text-gray-500 hover:text-black underline-offset-8 decoration-1 px-5 py-2 transition-colors">Women</a>
                <a href="{{ route('category', 'kids') }}"
                    class="group-hover:text-gray-500 hover:text-black underline-offset-8 decoration-1 px-5 py-2 transition-colors">Kids</a>
            </nav>
        </div>

        <div class="flex items-center gap-5 justify-self-end">
            @include('components.search')

            <nav class="flex items-center gap-3">
                <a aria-label="Go to my account" href="{{ route('login') }}"
                    class="p-2 rounded-full hover:bg-input focus:bg-input">
                    <x-phosphor-user class="w-5 h-5" />
                </a>

                <a aria-label="Go to shopping cart" href="{{ route('checkout') }}"
                    class="p-2 rounded-full hover:bg-input focus:bg-input">
                    <x-phosphor-shopping-bag-light class="w-6 h-6" />
                </a>

                <button id="menu-button" aria-label="Open menu"
                    class="lg:hidden p-2 rounded-full hover:bg-input focus:bg-input">
                    <x-phosphor-list class="w-6 h-6" />
                </button>
            </nav>
        </div>
    </div>

    <div id="mobile-nav" class="hidden">
        <div id="menu-close-overlay" class="fixed inset-0 bg-black/50"></div>
        <div class="bg-background fixed top-0 right-0 w-[70vw] bottom-0">
            <div class="flex justify-end p-5">
                <button id="menu-close-button" class="lg:hidden p-2 rounded-full hover:bg-input focus:bg-input">
                    <x-phosphor-x class="w-6 h-6" />
                </button>
            </div>

            <nav class="font-medium group flex flex-col">
                <a href="{{ route('category', 'featured') }}"
                    class="group-hover:text-gray-500 hover:text-black underline-offset-8 decoration-1 px-5 py-2 transition-colors">New
                    &
                    Featured</a>
                <a href="{{ route('category', 'men') }}"
                    class="group-hover:text-gray-500 hover:text-black underline-offset-8 decoration-1 px-5 py-2 transition-colors">Men</a>
                <a href="{{ route('category', 'women') }}"
                    class="group-hover:text-gray-500 hover:text-black underline-offset-8 decoration-1 px-5 py-2 transition-colors">Women</a>
                <a href="{{ route('category', 'kids') }}"
                    class="group-hover:text-gray-500 hover:text-black underline-offset-8 decoration-1 px-5 py-2 transition-colors">Kids</a>
            </nav>
        </div>
    </div>
</header>

<script>
    const menuButton = document.getElementById("menu-button")
    const menuCloseButton = document.getElementById("menu-close-button")
    const mobileNav = document.getElementById("mobile-nav")
    const menuCloseOverlay = document.getElementById("menu-close-overlay")

    menuButton.addEventListener('click', (e) => {
        mobileNav.classList.remove('hidden')
    })

    menuCloseButton.addEventListener('click', (e) => {
        mobileNav.classList.add('hidden')
    })

    menuCloseButton.addEventListener('click', (e) => {
        mobileNav.classList.add('hidden')
    })

    menuCloseOverlay.addEventListener('click', (e) => {
        mobileNav.classList.add('hidden')
    })
</script>
