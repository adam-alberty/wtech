<x-layouts.default>
    <x-layouts.checkout :step="3">
        <section class="grid md:grid-cols-3 items-start gap-10">
            <div class="md:col-span-2">
                <h2 class="text-2xl font-semibold mb-10">Payment</h2>

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

                <form id="payment-form" action="{{ route('order.save') }}" method="POST">
                    @csrf

                    <div class="mt-8">
                        <h3 class="text-lg font-semibold mb-2">Payment Method</h3>
                        <div class="grid gap-3">
                            @foreach (\App\Models\PaymentType::all() as $method)
                                <label class="flex items-center p-3 rounded cursor-pointer transition-colors
                                    {{ old('payment_method') == $method->name ? 'bg-gray-300' : 'bg-muted hover:bg-gray-200' }}">
                                    <input type="radio" name="payment_method" value="{{ $method->name }}"
                                           class="mr-2" {{ old('payment_method') == $method->name ? 'checked' : '' }}
                                           required>
                                    {{ $method->name }}
                                </label>
                            @endforeach
                            @error('payment_method')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-10 flex gap-4">
                        <a href="{{ route('delivery') }}"
                           class="bg-muted text-muted-foreground p-3 rounded-full w-full text-center hover:bg-gray-200 transition-colors">
                            Back to Delivery
                        </a>
                        <button type="submit"
                                class="bg-primary text-primary-foreground p-3 rounded-full w-full hover:bg-gray-500 hover:text-accent-foreground transition-colors">
                            Pay and finalize order
                        </button>
                    </div>
                </form>
            </div>

            <x-cart.summary :subtotal="$subtotal" :delivery_price="$delivery_price" :total="$total"
                            :button_text="'Pay and finalize order'" :step="3" />
        </section>
    </x-layouts.checkout>
</x-layouts.default>
