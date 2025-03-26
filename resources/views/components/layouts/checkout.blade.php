<div class="px-8">
    <div class="mx-auto max-w-screen-lg mt-10 mb-40">

        <div class="grid grid-cols-3 gap-5 mb-10">
            <div @class([
                'px-3 py-3 flex justify-center border-t-4',
                'border-primary font-bold text-foreground' => $step == 1,
                'text-muted-foreground' => $step != 1,
            ])><span class="hidden md:inline">Shopping </span>Cart</div>
            <div @class([
                'px-3 py-3 flex justify-center border-t-4',
                'border-primary font-bold text-foreground' => $step == 2,
                'text-muted-foreground' => $step != 2,
            ])>Delivery</div>
            <div @class([
                'px-3 py-3 flex justify-center border-t-4',
                'border-primary font-bold text-foreground' => $step == 3,
                'text-muted-foreground' => $step != 3,
            ])>Payment</div>
        </div>


        {{ $slot }}
    </div>
</div>
