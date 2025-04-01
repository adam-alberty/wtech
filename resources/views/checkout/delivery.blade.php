<x-layouts.default>
    <x-layouts.checkout :step="2">
        <section class="grid md:grid-cols-3 items-start gap-10">
            <div class="md:col-span-2">
                <h2 class="text-2xl font-semibold mb-10">Delivery</h2>

                <div class="grid gap-4">
                    <x-input :id="'email'" :name="'email'" :label="'Email'" :type="'email'" />

                    <div class="grid grid-cols-2 gap-4">
                        <x-input :id="'first_name'" :name="'first_name'" :label="'First name'" />
                        <x-input :id="'last_name'" :name="'last_name'" :label="'Last name'" />
                    </div>

                    <x-input :id="'street_address'" :name="'street_address'" :label="'Street address'" />
                    <x-input :id="'city'" :name="'city'" :label="'City'" />
                    <x-input :id="'zip_code'" :name="'zip_code'" :label="'Zip code'" />
                    <x-input :id="'phone_number'" :name="'phone_number'" :label="'Phone number'" />
                </div>

                <div class="mt-14 grid gap-3">
                    <h2 class="text-lg font-semibold mb-2">Delivery Type</h2>

                    <div class="p-3 bg-gray-300 rounded">Packeta</div>
                    <div class="p-3 bg-muted rounded">SPS</div>
                    <div class="p-3 bg-muted rounded">In person</div>
                </div>
            </div>

            <x-cart.summary />
        </section>
    </x-layouts.checkout>
</x-layouts.default>
