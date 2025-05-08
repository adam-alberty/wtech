<header class="px-8 sticky left-0 right-0 top-0 z-10 bg-background border-gray-200">
    <div class="mx-auto max-w-screen-3xl py-3 grid grid-cols-2 lg:grid-cols-[1fr_auto_1fr] items-center">
        <div class="shrink-0">
            <x-logo />
        </div>

        <div class="hidden lg:block shrink-0 grow w-full">
            <nav class="font-medium flex group">
                @foreach($collections as $collection)
                    <a href="{{ route('collection', $collection->slug) }}"
                       class="group-hover:text-gray-500 hover:text-black underline-offset-8 decoration-1 px-5 py-2 transition-colors">
                        {{ $collection->name }}
                    </a>
                @endforeach
            </nav>
        </div>

        <div class="flex items-center gap-5 justify-self-end">
            @include('components.search')

            <nav class="flex items-center gap-3">
                @auth
                    <div class="flex items-center gap-2">
                        <span>{{ auth()->user()->email }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" aria-label="Log out" class="p-2 rounded-full hover:bg-input focus:bg-input">
                                <x-phosphor-sign-out class="w-5 h-5" />
                            </button>
                        </form>
                        @if(auth()->user()->role === 'admin')
                            <a aria-label="Go to admin panel" href="{{ route('admin.products') }}"
                               class="p-2 rounded-full hover:bg-input focus:bg-input">
                                <x-phosphor-gear class="w-5 h-5" />
                            </a>
                        @endif
                    </div>
                @else
                    <a aria-label="Go to my account" href="{{ route('login') }}"
                       class="p-2 rounded-full hover:bg-input focus:bg-input">
                        <x-phosphor-user class="w-5 h-5" />
                    </a>
                @endauth

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
            <nav class="flex flex-col p-5 gap-3">
                @foreach($collections as $collection)
                    <a href="{{ route('collection', $collection->slug) }}"
                       class="hover:text-gray-500 py-2 transition-colors">
                        {{ $collection->name }}
                    </a>
                @endforeach
                @auth
                    <div class="flex flex-col gap-3 mt-3">
                        <span>{{ auth()->user()->email }}</span>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-left hover:text-gray-500 py-2">Log out</button>
                        </form>
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.products') }}"
                               class="hover:text-gray-500 py-2">Admin Panel</a>
                        @endif
                    </div>
                @else
                    <a href="{{ route('login') }}"
                       class="hover:text-gray-500 py-2">Log in</a>
                @endauth
                <a href="{{ route('checkout') }}"
                   class="hover:text-gray-500 py-2">Shopping Cart</a>
            </nav>
        </div>
    </div>
</header>

<script>
    const menuButton = document.getElementById("menu-button");
    const menuCloseButton = document.getElementById("menu-close-button");
    const mobileNav = document.getElementById("mobile-nav");
    const menuCloseOverlay = document.getElementById("menu-close-overlay");

    menuButton.addEventListener('click', (e) => {
        mobileNav.classList.remove('hidden');
    });

    menuCloseButton.addEventListener('click', (e) => {
        mobileNav.classList.add('hidden');
    });

    menuCloseOverlay.addEventListener('click', (e) => {
        mobileNav.classList.add('hidden');
    });
</script>
