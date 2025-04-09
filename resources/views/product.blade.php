<x-layouts.default>
    <div class="px-8">
        <div class="mx-auto max-w-screen-xl mt-10 mb-20">
            <section class="grid items-start md:grid-cols-5 gap-10">
                <div class="md:sticky top-20 md:col-span-3 flex items-start gap-2">
                    <div class="shrink-0 grid gap-2">
                        <img src="/assets/product-2.png" class="object-cover w-8 h-8 md:w-16 md:h-16" alt="">
                        <img src="/assets/product-3.png" class="object-cover w-8 h-8 md:w-16 md:h-16" alt="">
                        <img src="/assets/product-4.png" class="object-cover w-8 h-8 md:w-16 md:h-16" alt="">
                        <img src="/assets/product-5.png" class="object-cover w-8 h-8 md:w-16 md:h-16" alt="">
                    </div>
                    <div>
                        <img class="h-full w-full object-cover" src="/assets/product-1.png" alt="">
                    </div>
                </div>

                <div class="md:col-span-2">
                    <h2 class="text-2xl font-semibold">{{ $product['name'] }}</h2>
                    <div class="text-muted-foreground text-lg">{{ $product['category'] }}</div>
                    <div class="text-lg font-semibold mt-4">
                        {{ number_format($product['price'], 2, '.', ' ') }} €
                    </div>

                    <div class="mt-5">
                        <div class="font-semibold mb-2">Select variant</div>

                        <div class="flex flex-wrap gap-2">
                            <button class="w-10 h-10 outline-3 outline-offset-2 outline-primary rounded-sm bg-blue-600">
                            </button>
                            <button class="w-10 h-10 outline-offset-2 oultine-transparent rounded-sm bg-red-400">
                            </button>
                        </div>
                    </div>

                    <div class="mt-5">
                        <div class="font-semibold mb-2">Select size</div>

                        <div class="grid grid-cols-4 gap-2">
                            <button class="rounded-sm p-3 px-2 border">
                                EU 38
                            </button>
                            <button class="rounded-sm p-3 px-2 border">
                                EU 38.5
                            </button>
                            <button class="rounded-sm p-3 px-2 border">
                                EU 38.5
                            </button>
                            <button class="rounded-sm p-3 px-2 border">
                                EU 39
                            </button>
                            <button class="rounded-sm p-3 px-2 border">
                                EU 39.5
                            </button>
                            <button class="rounded-sm p-3 px-2 border">
                                EU 40
                            </button>
                            <button class="rounded-sm p-3 px-2 border">
                                EU 40.5
                            </button>
                            <button class="rounded-sm p-3 px-2 border">
                                EU 41
                            </button>
                            <button class="rounded-sm p-3 px-2 border">
                                EU 41.5
                            </button>
                            <button class="rounded-sm p-3 px-2 border line-through text-muted-foreground">
                                EU 40
                            </button>
                        </div>
                    </div>

                    <button class="bg-primary text-primary-foreground p-5 w-full font-bold rounded-full mt-10">Add to
                        cart</button>

                    <div class="bg-gray-100 mt-10 p-5 text-center">
                        Get free shipping on all orders over 50 €
                    </div>

                    <section class="mt-10 prose">
                        {!! $product['htmlDescription'] !!}
                    </section>

                </div>
            </section>
        </div>
    </div>
</x-layouts.default>
