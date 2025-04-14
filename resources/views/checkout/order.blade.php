<x-layouts.default>
    <section class="container mx-auto py-10">
        <h2 class="text-3xl font-semibold mb-6">Thank You for Your Order!</h2>

        @if (session('success'))
            <div class="text-green-600 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-gray-100 p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-4">Order Details</h3>
            <div class="grid gap-4">
                <div>
                    <span class="font-semibold">Order Number:</span> #{{ $order->id }}
                </div>
                <div>
                    <span class="font-semibold">Total:</span> {{ number_format($order->price, 2, '.', ' ') }} €
                </div>
                <div>
                    <span class="font-semibold">Status:</span> {{ ucfirst($order->status) }}
                </div>
                <div>
                    <span class="font-semibold">Delivery Method:</span> {{ $order->delivery_type->name ?? 'N/A' }} ({{ number_format($order->delivery_type->price ?? 0, 2, '.', ' ') }} €)
                </div>
                <div>
                    <span class="font-semibold">Shipping Address:</span>
                    <div>
                        {{ $order->full_name }}<br>
                        {{ $order->street_address }}, {{ $order->city }}, {{ $order->zip_code }}, {{ $order->country }}<br>
                        {{ $order->email }}<br>
                        {{ $order->phone_number }}
                    </div>
                </div>
                <div>
                    <span class="font-semibold">Items:</span>
                    <ul class="list-disc ml-5">
                        @foreach ($order->items as $item)
                            <li>
                                {{ $item->name }} ({{ $item->quantity }} x {{ number_format($item->unit_price, 2, '.', ' ') }} €)
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="mt-8 flex gap-4">
            <a href="{{ route('home') }}"
               class="bg-primary text-primary-foreground p-3 rounded-full hover:bg-gray-500 hover:text-accent-foreground transition-colors">
                Back to Home
            </a>
        </div>
    </section>
</x-layouts.default>
