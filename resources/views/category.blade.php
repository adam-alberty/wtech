<x-layouts.default>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach ($products as $product)
            @include('components.product', $product)
        @endforeach
    </div>
</x-layouts.default>
