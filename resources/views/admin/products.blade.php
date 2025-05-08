<x-layouts.admin>
    <div class="m-10">
        <div class="flex justify-between items-center gap-3">
            <h1 class="text-2xl font-semibold">Products</h1>
            <a href="{{ route('admin.products.create') }}"
               class="inline-block p-2 px-4 bg-primary text-primary-foreground">New Product</a>
        </div>

        <table class="mt-10 w-full">
            <thead>
            <tr class="text-left">
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Product Name</th>
                <th class="py-2 px-4">Price</th>
                <th class="py-2 px-4">Description</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="text-left">
            @foreach ($products as $product)
                <tr class="border-b">
                    <td class="w-10 py-2 px-4">{{ $product->id }}</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('product', $product->slug) }}"
                           class="underline hover:underline-offset-4 transition-all">
                            {{ $product->name }}
                        </a>
                    </td>
                    <td class="py-2 px-4">{{ number_format($product->price, 2) }} €</td>
                    <td class="py-2 px-4">{{ Str::limit($product->description, 50) }}</td>
                    <td class="w-20">
                        <div class="flex gap-7">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="flex gap-3 items-center">
                                <x-phosphor-pen class="w-5 h-5" />
                                <span>Edit</span>
                            </a>
                            <form action="{{ route('admin.products.delete', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="flex gap-3 items-center text-red-500"
                                        onclick="return confirm('Are you sure you want to delete this product?')">
                                    <x-phosphor-trash class="w-5 h-5" />
                                    <span>Delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.admin>
