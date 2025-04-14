@props([
    'subtotal' => 0,
    'delivery_price' => 0,
    'total' => 0,
    'button_text' => 'Continue',
    'button_link' => null,
    'step' => 1,
    'button_disabled' => false
])

<div class="bg-gray-100 p-5 sticky top-20">
    <div class="text-2xl font-semibold mb-3">Summary</div>
    <div class="space-y-2">
        <div class="flex justify-between">
            <div>Subtotal</div>
            <div class="font-semibold">{{ number_format($subtotal, 2, '.', ' ') }} €</div>
        </div>
        <div class="flex justify-between">
            <div>Delivery</div>
            <div class="font-semibold">{{ number_format($delivery_price, 2, '.', ' ') }} €</div>
        </div>
        <div class="flex justify-between pt-2 border-t border-border">
            <div>Total</div>
            <div class="font-semibold">{{ number_format($total, 2, '.', ' ') }} €</div>
        </div>
    </div>

    <div class="my-5 h-px bg-border"></div>

    @if ($step == 3)
        <button type="submit" form="payment-form"
                class="bg-primary text-primary-foreground rounded-full w-full p-3 block text-center hover:bg-gray-500 hover:text-accent-foreground transition-colors">
            {{ $button_text ?? 'Pay and finalize order' }}
        </button>
    @elseif ($step == 2)
        <button type="submit" form="delivery-form"
                class="bg-primary text-primary-foreground rounded-full w-full p-3 block text-center hover:bg-gray-500 hover:text-accent-foreground transition-colors">
            {{ $button_text ?? 'Continue to Payment' }}
        </button>
    @else
        <a href="{{ $button_link ?? route('delivery') }}"
           class="bg-primary text-primary-foreground rounded-full w-full p-3 block text-center hover:bg-gray-500 hover:text-accent-foreground transition-colors {{ $button_disabled ? 'opacity-50 cursor-not-allowed pointer-events-none' : '' }}">
            {{ $button_text ?? 'Continue' }}
        </a>
    @endif
</div>
