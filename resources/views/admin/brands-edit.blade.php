<x-layouts.admin>
    <div class="m-10">
        <div class="flex justify-between items-center gap-3">
            <h1 class="text-2xl font-semibold">Edit brand</h1>
        </div>

        <form class="mt-10 grid gap-5" action="{{ route('admin.brands.edit', $brand->id) }}" method="POST">
            @csrf
            @method('put')
            <x-input label="Name" id="name" type="text" name="name" placeholder="" :value="$brand->name" />
            <div>
                <button type="submit"
                    class="inline-block p-3 px-5 rounded-full bg-primary text-primary-foreground">Save</button>
            </div>
        </form>
    </div>
</x-layouts.admin>
