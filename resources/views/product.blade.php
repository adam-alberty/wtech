<x-layouts.default>
    <div class="px-8">
        <div class="mx-auto max-w-screen-lg mt-10 mb-20">
            <section class="grid grid-cols-5 gap-10">
                <div class="aspect-square sticky top-10 col-span-3">
                    <img class="h-full w-full object-cover rounded-xl" src="/assets/product-image.jpg" alt="">
                </div>

                <div class="col-span-2">
                    <h2 class="text-2xl font-semibold">Nike Air Force 1 Max</h2>
                    <div class="text-muted-foreground text-lg">Men's running shoes</div>
                    <div class="text-lg font-semibold mt-4">
                        193,99€
                    </div>

                    <div class="mt-5">
                        <div class="font-semibold mb-2">Select variant</div>

                        <div class="flex flex-wrap gap-2">
                            <button class="w-14 h-14 border-2 border-primary rounded-xl bg-green-400">
                            </button>
                            <button class="w-14 h-14 border-2 border-transparent rounded-xl bg-blue-400">
                            </button>
                        </div>

                    </div>

                    <div class="mt-5">
                        <div class="font-semibold mb-2">Select size</div>

                        <div class="flex flex-wrap gap-2">
                            <button class="rounded-xl p-2 px-4 border">
                                EU 38
                            </button>
                            <button class="rounded-xl p-2 px-4 border">
                                EU 38.5
                            </button>
                            <button class="rounded-xl p-2 px-4 border">
                                EU 38.5
                            </button>
                            <button class="rounded-xl p-2 px-4 border">
                                EU 39
                            </button>
                            <button class="rounded-xl p-2 px-4 border">
                                EU 39.5
                            </button>
                            <button class="rounded-xl p-2 px-4 border">
                                EU 40
                            </button>
                            <button class="rounded-xl p-2 px-4 border">
                                EU 40.5
                            </button>
                            <button class="rounded-xl p-2 px-4 border">
                                EU 41
                            </button>
                            <button class="rounded-xl p-2 px-4 border">
                                EU 41.5
                            </button>
                            <button class="rounded-xl p-2 px-4 border">
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
