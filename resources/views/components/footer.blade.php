@include('components.email-deals')

<footer class="px-8">
    <div class="max-w-screen-2xl mx-auto py-20">
        <div class="grid grid-cols-5 items-start gap-30 font-semibold">
            <section class="grid gap-2 text-muted-foreground">
                <h2 class="mb-5 text-foreground">Company</h2>
                <a href="/">About</a>
                <a href="/">News</a>
                <a href="/">Career</a>
            </section>

            <section class="grid gap-2 text-muted-foreground">
                <h2 class="mb-5 text-foreground">Help</h2>
                <a href="/">Returns</a>
                <a href="/">Shipping and Delivery</a>
                <a href="/">Order status</a>
                <a href="/">Contact Us</a>
            </section>

            <section class="grid gap-2 text-muted-foreground">
                <h2 class="mb-5 text-foreground">Other</h2>
                <a href="/">Privacy Policy</a>
                <a href="/">Terms of Use</a>
            </section>

            <div class="col-span-2 justify-self-end w-[200px]">
                <img src="/assets/logo.png" alt="">
            </div>
        </div>

        <p class="mt-20 text-muted-foreground font-semibold">&copy; {{ \Carbon\Carbon::now()->format('Y') }} WTECH WEAR.
            All rights reserved</p>
    </div>
</footer>
