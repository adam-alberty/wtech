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

            <x-cart.summary />
        </section>
    </x-layouts.checkout>
</x-layouts.default>
