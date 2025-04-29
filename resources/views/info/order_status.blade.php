<x-layouts.default>

    <div class="text-center pt-20 mb-10">
        <h2 class="text-3xl font-semibold">View Your Order</h2>
        <p class="text-muted-foreground mt-3">To check the status of your order
            please enter your order number and email address.</p>
    </div>

    <div class="max-w-md mx-auto mb-10">
        <form action="{{ route('get_order_status') }}" method="POST" class="grid gap-2 mb-8">
            @csrf
            <input type="text" name="order_number" placeholder="Order number" class="p-3 rounded-xl border w-full">
            <input type="email" name="email" placeholder="Email" class="p-3 rounded-xl border w-full">

            <div class="flex justify-end mt-5">
                <div class="shrink-0 flex">
                    <button type="submit"
                        class="bg-primary py-3 px-5 rounded-full text-primary-foreground font-semibold">
                        Check order</button>
                </div>
            </div>
        </form>

        @if (isset($order))
            <div class="max-w-md mx-auto bg-gray-100 p-5 rounded-xl text-center">
                <h3 class="text-xl font-semibold">Order Status</h3>
                <p><strong>Order Number:</strong> {{ $order['order_number'] }}</p>
                <p><strong>Full Name:</strong> {{ $order['full_name'] }}</p>
                <p><strong>Status:</strong> {{ $order['status'] }}</p>
            </div>
        @endif


    </div>

</x-layouts.default>
