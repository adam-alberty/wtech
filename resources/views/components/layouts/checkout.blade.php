<div class="px-8">
    <div class="mx-auto max-w-screen-lg mt-10 mb-40">

        <div class="grid grid-cols-3 gap-5 mb-10">
            <div @class([
                'px-10 py-3 border-t-4',
                'border-primary font-bold' => $step == 1,
            ])>Shopping cart</div>
            <div @class([
                'px-10 py-3 border-t-4',
                'border-primary font-bold' => $step == 2,
            ])>Delivery</div>
            <div @class([
                'px-10 py-3 border-t-4',
                'border-primary font-bold' => $step == 3,
            ])>Payment</div>
        </div>

        <section class="grid grid-cols-3 items-start gap-10">
            {{ $slot }}
        </section>
    </div>
</div>
