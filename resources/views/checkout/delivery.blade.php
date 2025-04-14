<x-layouts.default>
    <x-layouts.checkout :step="2">
        <section class="grid md:grid-cols-3 items-start gap-10">
            <div class="md:col-span-2">
                <h2 class="text-2xl font-semibold mb-10">Delivery</h2>

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

                @if ($errors->any())
                    <div class="text-red-600 mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form id="delivery-form" action="{{ route('delivery.save') }}" method="POST">
                    @csrf

                    <div class="grid gap-4">
                        <x-input
                            :id="'full_name'"
                            :name="'full_name'"
                            :label="'Full name'"
                            :value="$delivery_data['full_name'] ?? ''"
                            :error="$errors->first('full_name')"
                        />
                        <x-input
                            :id="'email'"
                            :name="'email'"
                            :label="'Email'"
                            :type="'email'"
                            :value="$delivery_data['email'] ?? ''"
                            :error="$errors->first('email')"
                        />
                        <x-input
                            :id="'phone_number'"
                            :name="'phone_number'"
                            :label="'Phone number'"
                            :value="$delivery_data['phone_number'] ?? ''"
                            :error="$errors->first('phone_number')"
                        />
                        <x-input
                            :id="'country'"
                            :name="'country'"
                            :label="'Country'"
                            :value="$delivery_data['country'] ?? ''"
                            :error="$errors->first('country')"
                        />
                        <x-input
                            :id="'city'"
                            :name="'city'"
                            :label="'City'"
                            :value="$delivery_data['city'] ?? ''"
                            :error="$errors->first('city')"
                        />
                        <x-input
                            :id="'street_address'"
                            :name="'street_address'"
                            :label="'Street address'"
                            :value="$delivery_data['street_address'] ?? ''"
                            :error="$errors->first('street_address')"
                        />
                        <x-input
                            :id="'zip_code'"
                            :name="'zip_code'"
                            :label="'Zip code'"
                            :value="$delivery_data['zip_code'] ?? ''"
                            :error="$errors->first('zip_code')"
                        />

                        <div class="mt-8">
                            <h3 class="text-lg font-semibold mb-2">Delivery Type</h3>
                            <div class="grid gap-3">
                                @foreach ($delivery_types as $type)
                                    <label class="flex items-center p-3 rounded cursor-pointer transition-colors
                                        {{ isset($delivery_data['delivery_type_id']) && $delivery_data['delivery_type_id'] == $type->id ? 'bg-gray-300' : 'bg-muted hover:bg-gray-200' }}">
                                        <input type="radio" name="delivery_type_id" value="{{ $type->id }}"
                                               class="mr-2" {{ isset($delivery_data['delivery_type_id']) && $delivery_data['delivery_type_id'] == $type->id ? 'checked' : '' }}
                                               required>
                                        {{ $type->name }} - {{ number_format($type->price, 2, '.', ' ') }} €
                                    </label>
                                @endforeach
                                @error('delivery_type_id')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-10 flex gap-4">
                            <a href="{{ route('checkout') }}"
                               class="bg-muted text-muted-foreground p-3 rounded-full w-full triumphant text-center hover:bg-gray-200 transition-colors">
                                Back to Cart
                            </a>
                            <button type="submit"
                                    class="bg-primary text-primary-foreground p-3 rounded-full w-full hover:bg-gray-500 hover:text-accent-foreground transition-colors">
                                Continue to Payment
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <x-cart.summary :subtotal="$subtotal" :delivery_price="$delivery_price" :total="$total"
                            :button_text="'Continue to Payment'" :button_link="route('payment')" :step="2" />
        </section>
    </x-layouts.checkout>
</x-layouts.default>
