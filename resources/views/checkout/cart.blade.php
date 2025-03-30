<x-layouts.default>
    <x-layouts.checkout :step="1">
        <section class="grid md:grid-cols-3 items-start gap-10">

            <div class="md:col-span-2">
                <h2 class="text-2xl font-semibold mb-10">Cart</h2>


                <table class="w-full">
                    <thead class="text-left">
                        <tr>
                            <th class="pb-10">Product</th>
                            <th class="pb-10 px-3">Quantity</th>
                            <th class="pb-10">Price</th>
                        </tr>
                    </thead>
                    <tbody class="mb-">
                        <x-cart.item />
                        <x-cart.item />
                        <x-cart.item />
                        <x-cart.item />
                    </tbody>
                </table>
            </div>

            <div class="bg-gray-100 p-5 sticky top-20">
                <div class="text-2xl font-semibold mb-3">Summary</div>
                <div>
                    <div>Total</div>
                    <div class="font-semibold">1993.99 €</div>
                </div>

                <div class="mt-10 flex gap-2">
                    <input type="text" class="bg-input p-2 h-10 px-5 w-full rounded-full mb-1"
                        placeholder="Coupon Code">
                    <button
                        class="bg-primary text-primary-foreground h-10 w-10 flex items-center justify-center rounded-full shrink-0">
                        <x-phosphor-caret-right class="w-5 h-5" />
                    </button>
                </div>
                <div class="my-5 h-px bg-border"></div>
                <button class="bg-primary text-primary-foreground rounded-full w-full p-3">
                    Continue
                </button>
            </div>
        </section>
    </x-layouts.checkout>
</x-layouts.default>
