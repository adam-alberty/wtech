<x-layouts.default>
    <div class="px-8">
        <section class="mx-auto max-w-screen-2xl py-20 grid items-start grid-cols-[300px_auto] gap-10">
            <div class="">
                <h2 class="text-2xl font-medium mb-10 py-2">Men's shoes (968)</h2>
                <div class="">
                    <div class="py-1">
                        Walking
                    </div>
                    <div class="py-1">
                        Football
                    </div>
                    <div class="py-1">
                        Tennis
                    </div>
                    <div class="py-1">
                        Training & gym
                    </div>
                </div>

                <section class="mt-10">
                    <div class="font-semibold mb-3">Color</div>
                    <ul>
                        <li class="flex gap-2">
                            <input type="checkbox">
                            <div>Red</div>
                        </li>
                        <li class="flex gap-2">
                            <input type="checkbox">
                            <div>Cyan</div>
                        </li>
                        <li class="flex gap-2">
                            <input type="checkbox">
                            <div>Yellow</div>
                        </li>
                        <li class="flex gap-2">
                            <input type="checkbox">
                            <div>Black</div>
                        </li>
                    </ul>
                </section>
            </div>

            <section>
                <div class="flex justify-end gap-1 mb-5">
                    <div class="px-3 py-2 rounded-sm font-semibold">Top sellers</div>
                    <div class="px-3 py-2 rounded-sm text-muted-foreground">Newest</div>
                    <div class="px-3 py-2 rounded-sm text-muted-foreground">Cheapest</div>
                    <div class="px-3 py-2 rounded-sm text-muted-foreground">Most expensive</div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 gap-y-10">
                    @foreach ($products as $product)
                        @include('components.product', $product)
                    @endforeach
                </div>
            </section>
        </section>
    </div>
</x-layouts.default>
