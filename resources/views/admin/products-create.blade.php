<x-layouts.admin>

    <div class="m-10">
        <div class="flex justify-between items-center gap-3">
            <h1 class="text-2xl font-semibold">Create product</h1>
            <a href="{{ route('admin.products.create') }}"
                class="inline-block p-2 px-4 bg-primary text-primary-foreground">Save</a>
        </div>

        <form class="mt-10 grid gap-5" action="post">
            <div>
                <label for="brand" class="block mb-1">Product images</label>
                <input type="file" multiple accept="image/*"
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
        </form>
    </div>


</x-layouts.admin>
