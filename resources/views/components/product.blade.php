<a href="{{ $product['link'] }}" class="group">
    <div class="aspect-square">
        <img class="object-cover h-full w-full group-hover:brightness-105 transition-all" src="{{ $product['image'] }}"
            alt="{{ $product['name'] }}">
    </div>
    <div class="font-semibold mt-5">{{ $product['name'] }}</div>
    <div class="font-semibold text-muted-foreground">{{ $product['category'] }}</div>
    <div class="font-semibold mt-2">{{ number_format($product['price'] / 100, 2, '.', ' ') }} €</div>
</a>
