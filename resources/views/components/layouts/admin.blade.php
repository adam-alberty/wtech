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
                            <a href="{{ route('admin.products') }}" @class([
                                'p-2 block',
                                'bg-muted' => in_array(Route::currentRouteName(), [
                                    'admin.products',
                                    'admin',
                                ]),
                            ])>Products</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.brands') }}" @class([
                                'p-2 block',
                                'bg-muted' => Route::currentRouteName() == 'admin.brands',
                            ])>Brands</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.categories') }}" @class([
                                'p-2 block',
                                'bg-muted' => Route::currentRouteName() == 'admin.categories',
                            ])>Categories</a>
                        </li>
                    </ul>
                </div>
                <a href="{{ route('home') }}" aria-label="Exit admin panel"
                   class="flex w-full gap-2 p-3 cursor-pointer bg-red-400 text-white">
                    <x-phosphor-sign-out class="w-5 h-5" />
                    Exit admin panel
                </a>
            </nav>
        </aside>
        <div>
            {{ $slot }}
        </div>
    </main>
</x-layouts.base>
