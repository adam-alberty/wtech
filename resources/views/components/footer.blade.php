@include('components.email-deals')

<footer class="px-8">
    <div class="max-w-screen-2xl mx-auto py-20">
        <div class="grid lg:grid-cols-5 items-start gap-y-10 lg:gap-y-30 lg:gap-30 font-semibold">
            <section class="grid gap-2 text-muted-foreground">
                <h2 class="mb-5 text-foreground">Company</h2>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('news') }}">News</a>
                <a href="{{ route('career') }}">Career</a>
            </section>

            <section class="grid gap-2 text-muted-foreground">
                <h2 class="mb-5 text-foreground">Help</h2>
                <a href="{{ route('returns') }}">Returns</a>
                <a href="{{ route('shipping_and_delivery') }}">Shipping and Delivery</a>
                <a href="{{ route('order_status') }}">Order status</a>
                <a href="{{ route('contact') }}">Contact Us</a>
            </section>

            <section class="grid gap-2 text-muted-foreground">
                <h2 class="mb-5 text-foreground">Other</h2>
                <a href="{{ route('privacy_policy') }}">Privacy Policy</a>
                <a href="{{ route('terms_of_use') }}">Terms of Use</a>
            </section>

            <div class="lg:col-span-2 lg:justify-self-end w-[200px]">
                <img src="/assets/logo.png" alt="">
            </div>
        </div>

        <p class="mt-20 text-muted-foreground font-semibold">&copy; {{ \Carbon\Carbon::now()->format('Y') }}
            {{ config('app.name') }}.
            All rights reserved</p>
    </div>
</footer>
