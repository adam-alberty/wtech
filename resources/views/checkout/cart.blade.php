<x-layouts.default>
    <x-layouts.checkout :step="1">
        <section class="grid md:grid-cols-3 items-start gap-10">
            <div class="md:col-span-2">
                <h2 class="text-2xl font-semibold mb-10">Cart</h2>

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

                @if (empty($cart_items))
                    <p>Your cart is empty.</p>
                @else
                    <table class="w-full">
                        <thead class="text-left">
                        <tr>
                            <th class="pb-10">Product</th>
                            <th class="pb-10 px-3">Quantity</th>
                            <th class="pb-10">Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($cart_items as $item)
                            <tr>
                                <td class="pb-7">
                                    <div class="flex items-start gap-4">
                                        <img src="{{ $item['image'] }}" class="w-10 h-10 object-cover" alt="{{ $item['product_name'] }}">
                                        <div>
                                            <div class="font-semibold">{{ $item['product_name'] }}</div>
                                            <div class="text-sm">Size: {{ $item['size_name'] }}</div>
                                            <div class="text-sm">Color: {{ $item['color_name'] }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="pb-7">
                                    <form action="{{ route('cart.update') }}" method="POST" class="flex items-center gap-3">
                                        @csrf
                                        <input type="hidden" name="sku_id" value="{{ $item['sku_id'] }}">
                                        <button type="submit" name="quantity" value="{{ $item['quantity'] - 1 }}"
                                                class="w-8 h-8 rounded-full border border-border flex items-center justify-center hover:border-muted-foreground transition-colors">
                                            -
                                        </button>
                                        <span class="w-8 text-center">{{ $item['quantity'] }}</span>
                                        <button type="submit" name="quantity" value="{{ $item['quantity'] + 1 }}"
                                                class="w-8 h-8 rounded-full border border-border flex items-center justify-center hover:border-muted-foreground transition-colors">
                                            +
                                        </button>
                                    </form>
                                </td>
                                <td class="pb-7">
                                    {{ number_format($item['unit_price'] * $item['quantity'], 2) }} €
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <x-cart.summary
                :subtotal="$subtotal"
                :delivery_price="$delivery_price"
                :total="$total"
                :button_text="'Continue to Delivery'"
                :button_link="route('delivery')"
                :step="1"
                :button_disabled="empty($cart_items)"
            />
        </section>
    </x-layouts.checkout>
</x-layouts.default>
