<x-layouts.base>
    <main class="grid grid-cols-[250px_auto] h-screen">
        <aside class="border-r">
            <nav class="flex flex-col justify-between h-full">
                <div>
                    <h1 class="text-lg font-semibold p-3">
                        <a href="{{ route('admin') }}">WTECH shoes admin</a>
                    </h1>

                    <ul>
                        <li>
                            <a href="{{ route('admin.products') }}" class="p-2 bg-muted block">Products</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.products') }}" class="p-2 block">Categories</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.products') }}" class="p-2 block">Collections</a>
                        </li>
                    </ul>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" aria-label="Log out"
                        class="flex w-full gap-2 p-3 cursor-pointer bg-red-400 text-white">
                        <x-phosphor-sign-out class="w-5 h-5" />
                        Log out
                    </button>
                </form>
            </nav>
        </aside>
        <div>
            {{ $slot }}
        </div>
    </main>
</x-layouts.base>
