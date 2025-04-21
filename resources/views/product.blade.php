<x-layouts.default>
    <div class="px-8">
        <div class="mx-auto max-w-screen-xl mt-10 mb-20">
            <section class="grid items-start md:grid-cols-5 gap-10">
                <div class="md:sticky top-20 md:col-span-3 flex items-start gap-2">
                    <div class="shrink-0 grid gap-2">
                        @foreach ($product['images'] as $index => $image)
                            <img src="{{ $image }}"
                                 class="object-cover w-8 h-8 md:w-16 md:h-16 cursor-pointer"
                                 alt="{{ $product['name'] }}"
                                 onclick="changeImage('{{ $image }}')"
                                 id="thumbnail-{{ $index }}">
                        @endforeach
                    </div>
                    <div>
                        <img class="h-full w-full object-cover"
                             src="{{ $product['image'] }}"
                             alt="{{ $product['name'] }}"
                             id="main-image">
                    </div>
                </div>

                <div class="md:col-span-2">
                    <h2 class="text-2xl font-semibold">{{ $product['name'] }}</h2>
                    <div class="text-muted-foreground text-lg">{{ $product['category'] }}</div>
                    <div class="text-lg font-semibold mt-4">
                        {{ number_format($product['price'], 2, '.', ' ') }} €
                    </div>

                    @if (session('success'))
                        <div class="text-green-600 mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="text-red-600 mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('product.addToCart', $product['slug']) }}" method="POST">
                        @csrf
                        <div class="mt-5">
                            <div class="font-semibold mb-2">Select Color</div>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($product['colors'] as $color)
                                    <div class="relative inline-block">
                                        <input type="radio" name="color_id" value="{{ $color['id'] }}"
                                               id="color-{{ $color['id'] }}"
                                               class="absolute opacity-0 w-10 h-10 peer"
                                               {{ $loop->first ? 'checked' : '' }}
                                               required>
                                        <label for="color-{{ $color['id'] }}"
                                               class="w-10 h-10 rounded-sm cursor-pointer border border-border peer-checked:border-primary peer-checked:ring-2 peer-checked:ring-primary block"
                                               style="background-color: {{ $color['code'] }}"
                                               title="{{ $color['name'] }}"></label>
                                    </div>
                                @endforeach
                            </div>
                            @error('color_id')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <div class="font-semibold mb-2">Select Size</div>
                            <div class="grid grid-cols-4 gap-2">
                                @foreach ($product['sizes'] as $size)
                                    <div class="relative inline-block">
                                        <input type="radio" name="size_id" value="{{ $size['id'] }}"
                                               id="size-{{ $size['id'] }}"
                                               class="absolute opacity-0 w-full h-full peer"
                                               {{ $loop->first ? 'checked' : '' }}
                                               required>
                                        <label for="size-{{ $size['id'] }}"
                                               class="block rounded-sm p-3 px-2 border border-border text-center cursor-pointer peer-checked:bg-primary peer-checked:text-primary-foreground peer-checked:border-primary">
                                            EU {{ $size['name'] }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @error('size_id')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <div class="font-semibold mb-2">Quantity</div>
                            <input type="number" name="quantity" value="1" min="1"
                                   class="border border-border p-2 w-20 rounded-sm">
                            @error('quantity')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit"
                                class="bg-primary text-primary-foreground p-5 w-full font-bold rounded-full mt-10 hover:bg-gray-500 hover:text-accent-foreground transition-colors">
                            Add to Cart
                        </button>
                    </form>

                    <section class="mt-10 prose">
                        {!! $product['htmlDescription'] !!}
                    </section>
                </div>
            </section>
        </div>
    </div>

    <script>
        function changeImage(imageSrc) {
            const mainImage = document.getElementById('main-image');
            mainImage.src = imageSrc;
        }
    </script>
</x-layouts.default>
