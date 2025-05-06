<x-layouts.admin>

    <div class="m-10">
        <div class="flex justify-between items-center gap-3">
            <h1 class="text-2xl font-semibold">Create product</h1>
            <a href="{{ route('admin.products.create') }}"
                class="inline-block p-2 px-4 bg-primary text-primary-foreground">Save</a>
        </div>

        <form class="mt-10 grid gap-5" action="post">
            <div>
                <label for="product_images" class="block mb-1">Product images</label>
                <input type="file" id="product_images" multiple accept="image/*"
                    class="p-3 rounded-xl border w-full focus:ring-2 ring-primary ring-offset-2 outline-none">
            </div>

            <x-input label="Name" id="name" type="text" name="name" placeholder="" :value="old('name')" />
            <x-input label="Price" id="price" type="number" name="price" placeholder="" :value="old('price')" />
            <x-textarea label="Description" id="description" type="number" name="description" rows="14"
                :value="old('description')" />

            <div>
                <label for="brand" class="block mb-1">Brand</label>
                <select name="brand_id" id="brand"
                    class="p-3 rounded-xl border w-full focus:ring-2 ring-primary ring-offset-2 outline-none">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid gap-5">
                <h2 class="text-xl font-medium mb-2">SKUs</h2>
                <div id="sku_container" class="grid gap-5">
                    <div class="border-l-4 pl-5">
                        <x-input label="SKU ID" id="sku" type="text" name="sku[]" placeholder=""
                            :value="old('sku')" />

                        <div>
                            <label class="mb-1 block" for="size">Size</label>
                            <select name="size_id[]" id="size"
                                class="p-3 rounded-xl border w-full focus:ring-2 ring-primary ring-offset-2 outline-none">
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="mb-1 block" for="color">Color</label>
                            <select name="color_id[]" id="color"
                                class="p-3 rounded-xl border w-full focus:ring-2 ring-primary ring-offset-2 outline-none">
                                @foreach ($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <x-input label="Price" id="price_before" type="number" name="price_before[]" placeholder=""
                            :value="old('price_before')" />
                        <x-input label="Amount in stock" id="amount_in_stock" type="number" name="amount_in_stock[]"
                            placeholder="" :value="old('amount_in_stock')" />
                    </div>
                </div>
                <div id="other_sku_inputs" class="grid gap-5"></div>
                <button type="button" class="bg-muted py-3 px-5 rounded-full" id="new_sku_button">Add
                    Another SKU</button>
            </div>
        </form>

    </div>

    <script>
        const newSKUButton = document.getElementById('new_sku_button')
        const skuContainer = document.getElementById('sku_container');
        const otherSkuInputs = document.getElementById('other_sku_inputs');

        newSKUButton.addEventListener('click', () => {
            const clone = skuContainer.cloneNode(true);
            otherSkuInputs.appendChild(clone);
        })
    </script>


</x-layouts.admin>
