<x-layouts.admin>
    <div class="m-10">
        <div class="flex justify-between items-center gap-3">
            <h1 class="text-2xl font-semibold">Create category</h1>
        </div>

        <form class="mt-10 grid gap-5" action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <x-input label="Name" id="name" type="text" name="name" placeholder="" :value="old('name')" />
            <div>
                <button type="submit"
                    class="inline-block p-3 px-5 rounded-full bg-primary text-primary-foreground">Save</button>
            </div>
        </form>
    </div>
</x-layouts.admin>
