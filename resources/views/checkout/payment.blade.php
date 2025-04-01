<x-layouts.default>
    <x-layouts.checkout :step="3">
        <section class="grid md:grid-cols-3 items-start gap-10">
            <div class="col-span-2">
                <h2 class="text-2xl font-semibold mb-10">Payment</h2>


                <div class="mt-14 grid gap-3">
                    <div class="p-3 bg-gray-300 rounded">Paypal</div>
                    <div class="p-3 bg-muted rounded">Stripe</div>
                    <div class="p-3 bg-muted rounded">In person</div>
                </div>
            </div>

            <x-cart.summary />
        </section>
    </x-layouts.checkout>
</x-layouts.default>
