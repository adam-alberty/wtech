<x-layouts.default>
    <div class="px-8">
        <section class="mx-auto max-w-screen-3xl py-20 grid items-start md:grid-cols-[300px_auto] gap-10">
            <aside class="lg:ml-5">
                <h2 class="text-2xl font-medium mb-10 py-2">
                    {{ $collection->name }} ({{ $products->count() }})
                </h2>
                <ul class="font-semibold">
                    @foreach ($categories as $category)
                        <li class="py-1">
                            <a href="{{ route('collection', ['slug' => $collection->slug, 'category' => $category->slug, 'sort' => $sort]) }}"
                               class="{{ $selectedCategorySlug === $category->slug ? 'text-black font-bold' : 'text-gray-600' }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="grid gap-10 mt-10">
                    <section>
                        <h3 class="font-semibold mb-3">Price</h3>
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label for="filter-price-from" class="inline-block mb-1">From</label>
                                <input id="filter-price-from" type="text" class="bg-gray-100 w-full p-2 rounded-sm"
                                       placeholder="From">
                            </div>
                            <div>
                                <label for="filter-price-to" class="inline-block mb-1">To</label>
                                <input id="filter-price-to" type="text" class="bg-gray-100 w-full p-2 rounded-sm"
                                       placeholder="To">
                            </div>
                        </div>
                    </section>

                    <section>
                        <h3 class="font-semibold mb-3">Color</h3>
                        <ul>
                            <li class="flex gap-2"><input type="checkbox" /><div>Red</div></li>
                            <li class="flex gap-2"><input type="checkbox" /><div>Cyan</div></li>
                            <li class="flex gap-2"><input type="checkbox" /><div>Yellow</div></li>
                            <li class="flex gap-2"><input type="checkbox" /><div>Black</div></li>
                        </ul>
                    </section>

                    <section>
                        <h3 class="font-semibold mb-3">Brand</h3>
                        <ul>
                            <li class="flex gap-2"><input type="checkbox" /><div>Nike</div></li>
                            <li class="flex gap-2"><input type="checkbox" /><div>Adidas</div></li>
                            <li class="flex gap-2"><input type="checkbox" /><div>Vans</div></li>
                            <li class="flex gap-2"><input type="checkbox" /><div>New Balance</div></li>
                        </ul>
                    </section>
                </div>
            </aside>

            <div>
                <section aria-label="Product ordering">
                    <div class="flex flex-col md:flex-row justify-end gap-1 mb-5 text-sm">
                        <a href="{{ route('collection', ['slug' => $collection->slug, 'category' => $selectedCategorySlug, 'sort' => 'top']) }}"
                           class="md:px-3 py-2 rounded-sm font-semibold {{ $sort === 'top' ? 'text-black' : 'text-muted-foreground' }}">
                            Top sellers
                        </a>
                        <a href="{{ route('collection', ['slug' => $collection->slug, 'category' => $selectedCategorySlug, 'sort' => 'newest']) }}"
                           class="md:px-3 py-2 rounded-sm {{ $sort === 'newest' ? 'font-semibold text-black' : 'text-muted-foreground' }}">
                            Newest
                        </a>
                        <a href="{{ route('collection', ['slug' => $collection->slug, 'category' => $selectedCategorySlug, 'sort' => 'cheapest']) }}"
                           class="md:px-3 py-2 rounded-sm {{ $sort === 'cheapest' ? 'font-semibold text-black' : 'text-muted-foreground' }}">
                            Cheapest
                        </a>
                        <a href="{{ route('collection', ['slug' => $collection->slug, 'category' => $selectedCategorySlug, 'sort' => 'most-expensive']) }}"
                           class="md:px-3 py-2 rounded-sm {{ $sort === 'most-expensive' ? 'font-semibold text-black' : 'text-muted-foreground' }}">
                            Most expensive
                        </a>
                    </div>
                </section>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 gap-y-10">
                    @foreach ($products as $product)
                        @include('components.product', $product)
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</x-layouts.default>
