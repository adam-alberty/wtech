<x-layouts.default>
    <x-layouts.checkout :step="2">
        <div class="col-span-2">
            <h2 class="text-2xl font-semibold mb-10">Delivery</h2>

            <input type="text" class="rounded-xl bg-background border-2 border-primary p-3 w-full">


        </div>

        <div class="bg-gray-100 p-4 rounded sticky top-20">
            <div class="text-2xl font-semibold mb-3">Summary</div>
            <div>
                <div>Total</div>
                <div class="font-semibold">1993.99 €</div>
            </div>

            <div class="mt-10">
                <input type="text" class="bg-input p-3 w-full rounded-full mb-1" placeholder="Coupon code">
                <button class="w-full bg-gray-300 p-3 rounded-full">Apply coupon</button>
            </div>
            <div class="my-5 h-px bg-border"></div>
            <button class="bg-primary text-primary-foreground rounded-full w-full p-3">
                Continue
            </button>
        </div>
    </x-layouts.checkout>
</x-layouts.default>
