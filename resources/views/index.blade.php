<x-layouts.default>
    {{-- Site banner --}}
    @include('components.banner')

    {{-- Products - New arrivals --}}
    <section class="mx-auto max-w-screen-2xl py-20">
        <h2 class="text-lg font-semibold mb-10">New arrivals</h2>
        <div class="grid grid-cols-4 gap-5">
            @foreach ($new_arrivals as $product)
                @include('components.product', $product)
            @endforeach
        </div>
    </section>

    {{-- Products - Most Popular --}}
    <section class="mx-auto max-w-screen-2xl pb-40">
        <h2 class="text-lg font-semibold mb-10">Most popular</h2>
        <div class="grid grid-cols-4 gap-5">
            @foreach ($most_popular as $product)
                @include('components.product', $product)
            @endforeach
        </div>
    </section>
</x-layouts.default>
