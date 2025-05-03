<x-layouts.admin>

    <div class="m-10">
        <div class="flex justify-between items-center gap-3">
            <h1 class="text-2xl font-semibold">Products</h1>
            <a href="{{ route('admin.products.create') }}"
                class="inline-block p-2 px-4 bg-primary text-primary-foreground">New
                Product</a>
        </div>

        <table class="mt-10 w-full">
            <thead>
                <tr class="text-left">
                    <th>
                        ID
                    </th>
                    <th>
                        Product name
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-left">
                @foreach ($products as $product)
                    <tr class="border-b">
                        <td class="w-10 py-2">
                            {{ $product->id }}
                        </td>
                        <td class="w-20 py-2">
                            <a href="{{ route('product', $product->slug) }}"
                                class="underline hover:underline-offset-4 transition-all">
                                {{ $product->name }}</a>
                        </td>
                        <td class="w-20 py-2">
                            {{ $product->price }} €</a>
                        </td>
                        <td class="w-20">
                            <div class="flex gap-5">
                                <a href="/" class="flex">
                                    <x-phosphor-pen class="w-5 h-5" />
                                    <span>Edit</span>
                                </a>
                                <button class="flex text-red-500">
                                    <x-phosphor-trash class="w-5 h-5" />
                                    <span>Delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</x-layouts.admin>
