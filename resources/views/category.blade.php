<x-layouts.default>
    <div class="px-8">
        <section class="mx-auto max-w-screen-3xl py-20 grid items-start md:grid-cols-[300px_auto] gap-10">
            <aside class="lg:ml-5">
                <h2 class="text-2xl font-medium mb-10 py-2">
                    {{ $collection->name }} ({{ $products->total() }})
                </h2>
                <form method="GET" action="{{ route('collection', $collection->slug) }}">
                    <ul class="font-semibold mb-10">
                        @foreach ($categories as $category)
                            <li class="py-1">
                                <a href="{{ route('collection', ['slug' => $collection->slug, 'query' => $query, 'category' => $category->slug, 'sort' => $sort, 'brand' => $selected_brands, 'color' => $selected_colors, 'price_from' => $price_from, 'price_to' => $price_to]) }}"
                                    class="{{ $selected_category === $category->slug ? 'text-black font-bold' : 'text-gray-600' }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <hr class="border-t-2 border-black mb-10">

                    <div class="grid gap-10 mt-10">
                        <section>
                            <h3 class="font-semibold mb-3">Price</h3>
                            <div class="grid grid-cols-2 gap-2">
                                <div>
                                    <label for="filter-price-from" class="inline-block mb-1">From</label>
                                    <input id="filter-price-from" name="price_from" type="text"
                                        class="bg-gray-100 w-full p-2 rounded-sm" placeholder="From"
                                        value="{{ $price_from }}">
                                </div>
                                <div>
                                    <label for="filter-price-to" class="inline-block mb-1">To</label>
                                    <input id="filter-price-to" name="price_to" type="text"
                                        class="bg-gray-100 w-full p-2 rounded-sm" placeholder="To"
                                        value="{{ $price_to }}">
                                </div>
                            </div>
                        </section>

                        <section>
                            <h3 class="font-semibold mb-3">Color</h3>
                            <ul>
                                @foreach ($colors as $color)
                                    <li class="flex gap-2">
                                        <input type="checkbox" name="color[]" value="{{ $color->id }}"
                                            {{ in_array($color->id, $selected_colors) ? 'checked' : '' }} />
                                        <div>{{ $color->name }}</div>
                                    </li>
                                @endforeach
                            </ul>
                        </section>

                        <section>
                            <h3 class="font-semibold mb-3">Brand</h3>
                            <ul>
                                @foreach ($brands as $brand)
                                    <li class="flex gap-2">
                                        <input type="checkbox" name="brand[]" value="{{ $brand->id }}"
                                            {{ in_array($brand->id, $selected_brands) ? 'checked' : '' }} />
                                        <div>{{ $brand->name }}</div>
                                    </li>
                                @endforeach
                            </ul>
                        </section>

                        <section>
                            <h3 class="font-semibold mb-3">Size</h3>
                            <ul>
                                @foreach ($sizes as $size)
                                    <li class="flex gap-2">
                                        <input type="checkbox" name="size[]" value="{{ $size->id }}"
                                            {{ in_array($size->id, $selected_sizes) ? 'checked' : '' }} />
                                        <div>{{ 'EU ' . $size->name }}</div>
                                    </li>
                                @endforeach
                            </ul>
                        </section>

                        <div class="flex flex-col space-y-3">
                            <button type="submit" class="bg-primary text-white px-4 py-2 rounded-full">
                                Apply Filters
                            </button>
                            <a href="{{ route('collection', ['slug' => $collection->slug, 'query' => $query]) }}"
                                class="bg-muted text-muted-foreground px-4 py-2 rounded-full text-center">
                                Reset Filters
                            </a>
                        </div>
                    </div>

                    <input type="hidden" name="query" value="{{ $query }}">
                    <input type="hidden" name="sort" value="{{ $sort }}">
                    @if ($selected_category)
                        <input type="hidden" name="category" value="{{ $selected_category }}">
                    @endif
                </form>
            </aside>

            <div>
                <section aria-label="Product ordering">
                    <div class="flex flex-col md:flex-row justify-end gap-1 mb-5 text-sm">
                        <a href="{{ route('collection', ['slug' => $collection->slug, 'query' => $query, 'category' => $selected_category, 'brand' => $selected_brands, 'color' => $selected_colors, 'price_from' => $price_from, 'price_to' => $price_to, 'sort' => 'top']) }}"
                            class="md:px-3 py-2 rounded-sm font-semibold {{ $sort === 'top' ? 'text-black' : 'text-muted-foreground' }}">
                            Top sellers
                        </a>
                        <a href="{{ route('collection', ['slug' => $collection->slug, 'query' => $query, 'category' => $selected_category, 'brand' => $selected_brands, 'color' => $selected_colors, 'price_from' => $price_from, 'price_to' => $price_to, 'sort' => 'newest']) }}"
                            class="md:px-3 py-2 rounded-sm {{ $sort === 'newest' ? 'font-semibold text-black' : 'text-muted-foreground' }}">
                            Newest
                        </a>
                        <a href="{{ route('collection', ['slug' => $collection->slug, 'query' => $query, 'category' => $selected_category, 'brand' => $selected_brands, 'color' => $selected_colors, 'price_from' => $price_from, 'price_to' => $price_to, 'sort' => 'cheapest']) }}"
                            class="md:px-3 py-2 rounded-sm {{ $sort === 'cheapest' ? 'font-semibold text-black' : 'text-muted-foreground' }}">
                            Cheapest
                        </a>
                        <a href="{{ route('collection', ['slug' => $collection->slug, 'query' => $query, 'category' => $selected_category, 'brand' => $selected_brands, 'color' => $selected_colors, 'price_from' => $price_from, 'price_to' => $price_to, 'sort' => 'most-expensive']) }}"
                            class="md:px-3 py-2 rounded-sm {{ $sort === 'most-expensive' ? 'font-semibold text-black' : 'text-muted-foreground' }}">
                            Most expensive
                        </a>
                    </div>
                </section>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 gap-y-10">
                    @if ($query && $products->isEmpty())
                        <p class="text-muted-foreground col-span-full text-center text-lg mt-20">No products found for
                            "{{ $query }}".</p>
                    @else
                        @foreach ($products as $product)
                            @include('components.product', $product)
                        @endforeach
                    @endif
                </div>

                <div class="mt-10 flex justify-center items-center gap-2 flex-wrap">
                    @if ($products->onFirstPage())
                        <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded cursor-not-allowed">First</span>
                    @else
                        <a href="{{ $products->url(1) }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">First</a>
                    @endif

                    @php
                        $currentPage = $products->currentPage();
                        $lastPage = $products->lastPage();
                        $range = 2;
                        $start = max(1, $currentPage - $range);
                        $end = min($lastPage, $currentPage + $range);

                        if ($end - $start < 4) {
                            if ($currentPage <= $range + 1) {
                                $end = min(5, $lastPage);
                            } else {
                                $start = max(1, $lastPage - 4);
                            }
                        }
                    @endphp

                    @for ($i = $start; $i <= $end; $i++)
                        @if ($i === $currentPage)
                            <span class="px-4 py-2 bg-gray-700 text-white rounded font-bold">{{ $i }}</span>
                        @else
                            <a href="{{ $products->url($i) }}"
                                class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">{{ $i }}</a>
                        @endif
                    @endfor

                    @if ($products->onLastPage())
                        <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded cursor-not-allowed">Last</span>
                    @else
                        <a href="{{ $products->url($products->lastPage()) }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Last</a>
                    @endif
                </div>
            </div>
        </section>
    </div>
</x-layouts.default>
