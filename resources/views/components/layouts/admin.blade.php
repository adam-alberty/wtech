<x-layouts.base>
    <main class="grid grid-cols-[250px_auto] h-screen">
        <aside class="border-r">
            <nav>
                <div>
                    Products
                </div>
            </nav>
        </aside>
        <div>
            {{ $slot }}
        </div>
    </main>
</x-layouts.base>
