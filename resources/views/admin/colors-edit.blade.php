<x-layouts.admin>
    <div class="m-10">
        <div class="flex justify-between items-center gap-3">
            <h1 class="text-2xl font-semibold">Edit Color</h1>
        </div>

        <form class="mt-10 grid gap-5" action="{{ route('admin.colors.update', $color->id) }}" method="POST">
            @csrf
            @method('PUT')

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

            <x-input label="Name" id="name" type="text" name="name" :value="old('name', $color->name)" maxlength="20" />
            @error('name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <x-input label="Color Code" id="color_code" type="text" name="color_code" :value="old('color_code', $color->color_code)" maxlength="10" />
            @error('color_code')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <div>
                <button type="submit"
                        class="inline-block p-2 px-4 bg-primary text-primary-foreground">Save</button>
            </div>
        </form>
    </div>
</x-layouts.admin>
