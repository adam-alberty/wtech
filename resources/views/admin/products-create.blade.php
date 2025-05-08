<x-layouts.admin>

    <div class="m-10">
        <div class="flex justify-between items-center gap-3">
            <h1 class="text-2xl font-semibold">Create Product</h1>
        </div>

        <form class="mt-10 grid gap-5" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                    <strong class="font-bold">Errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                <label for="product_images" class="block mb-1">Product Images (up to 5)</label>
                <input type="file" id="product_images" name="product_images[]" multiple accept="image/*"
                       class="p-3 rounded-xl border w-full focus:ring-2 ring-primary ring-offset-2 outline-none">
                @error('product_images.*')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <x-input label="Name" id="name" type="text" name="name" placeholder="" :value="old('name')" />
            @error('name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <div>
                <label for="price" class="block mb-1">Price</label>
                <input type="number" id="price" name="price"
                       value="{{ old('price') }}" step="0.01" min="0" max="999999.99"
                       class="p-3 rounded-xl border w-full focus:ring-2 ring-primary ring-offset-2 outline-none">
                @error('price')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <x-textarea label="Description" id="description" name="description" rows="14" :value="old('description')" />
            @error('description')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <div>
                <label for="brand" class="block mb-1">Brand</label>
                <select name="brand_id" id="brand"
                        class="p-3 rounded-xl border w-full focus:ring-2 ring-primary ring-offset-2 outline-none">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
                @error('brand_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="categories" class="block mb-1">Categories</label>
                <select name="categories[]" id="categories" multiple
                        class="p-3 rounded-xl border w-full focus:ring-2 ring-primary ring-offset-2 outline-none">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('categories')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="collections" class="block mb-1">Collections</label>
                <select name="collections[]" id="collections" multiple
                        class="p-3 rounded-xl border w-full focus:ring-2 ring-primary ring-offset-2 outline-none">
                    @foreach ($collections as $collection)
                        <option value="{{ $collection->id }}" {{ in_array($collection->id, old('collections', [])) ? 'selected' : '' }}>
                            {{ $collection->name }}
                        </option>
                    @endforeach
                </select>
                @error('collections')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="grid gap-5">
                <h2 class="text-xl font-medium mb-2">SKUs</h2>
                <div id="sku_container" class="grid gap-5">
                    <div class="border-l-4 pl-5 sku-group" data-index="0">
                        <x-input label="SKU ID" id="sku_0" type="text" name="sku[]" placeholder="" :value="old('sku.0')" />
                        @error('sku.0')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror

                        <div>
                            <label class="mb-1 block" for="size_0">Size</label>
                            <select name="size_id[]" id="size_0"
                                    class="p-3 rounded-xl border w-full focus:ring-2 ring-primary ring-offset-2 outline-none">
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->id }}" {{ old('size_id.0') == $size->id ? 'selected' : '' }}>
                                        {{ $size->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('size_id.0')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-1 block" for="color_0">Color</label>
                            <select name="color_id[]" id="color_0"
                                    class="p-3 rounded-xl border w-full focus:ring-2 ring-primary ring-offset-2 outline-none">
                                @foreach ($colors as $color)
                                    <option value="{{ $color->id }}" {{ old('color_id.0') == $color->id ? 'selected' : '' }}>
                                        {{ $color->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('color_id.0')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <x-input label="Amount in Stock" id="amount_in_stock_0" type="number" name="amount_in_stock[]"
                                 placeholder="" :value="old('amount_in_stock.0')" />
                        @error('amount_in_stock.0')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div id="other_sku_inputs" class="grid gap-5"></div>
                <button type="button" class="bg-muted py-3 px-5 rounded-full" id="new_sku_button">Add Another SKU</button>
            </div>

            <div>
                <button type="submit"
                        class="inline-block p-3 px-5 rounded-full bg-primary text-primary-foreground">Save</button>
            </div>
        </form>
    </div>

    <script>
        const newSKUButton = document.getElementById('new_sku_button');
        const skuContainer = document.getElementById('sku_container');
        const otherSkuInputs = document.getElementById('other_sku_inputs');
        let skuIndex = 1;

        newSKUButton.addEventListener('click', () => {
            const clone = skuContainer.querySelector('.sku-group').cloneNode(true);
            clone.dataset.index = skuIndex;
            clone.querySelector('input[name="sku[]"]').id = `sku_${skuIndex}`;
            clone.querySelector('input[name="sku[]"]').value = '';
            clone.querySelector('select[name="size_id[]"]').id = `size_${skuIndex}`;
            clone.querySelector('select[name="color_id[]"]').id = `color_${skuIndex}`;
            clone.querySelector('input[name="amount_in_stock[]"]').id = `amount_in_stock_${skuIndex}`;
            clone.querySelector('input[name="amount_in_stock[]"]').value = '';
            otherSkuInputs.appendChild(clone);
            skuIndex++;
        });
    </script>


</x-layouts.admin>
