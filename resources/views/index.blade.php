<x-layouts.default>
    {{-- Site banner --}}
    @include('components.banner')

    <div class="px-8">
        {{-- Products - New arrivals --}}
        <section class="mx-auto max-w-screen-3xl py-20">
            <h2 class="text-xl font-semibold mb-10">New arrivals</h2>
            <div class="grid grid-cols-4 gap-4">
                @foreach ($new_arrivals as $product)
                    @include('components.product', $product)
                @endforeach
            </div>
        </section>

        {{-- Products - Most Popular --}}
        <section class="mx-auto max-w-screen-3xl pb-40">
            <h2 class="text-xl font-semibold mb-10">Most popular</h2>
            <div class="grid grid-cols-4 gap-4">
                @foreach ($most_popular as $product)
                    @include('components.product', $product)
                @endforeach
            </div>
        </section>
    </div>
</x-layouts.default>
