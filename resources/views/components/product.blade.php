<a href="{{ $product['link'] }}">
    <div class="aspect-square">
        <img class="object-cover h-full w-full" src="{{ $product['image'] }}" alt="">
    </div>
    <h3 class="font-semibold mt-5">{{ $product['name'] }}</h3>
    <div class="font-semibold text-muted-foreground">{{ $product['category'] }}</div>
    <div class="font-semibold mt-2">{{ $product['price'] }}€</div>
</a>
