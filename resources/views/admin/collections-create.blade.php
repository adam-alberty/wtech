<x-layouts.admin>
    <div class="m-10">
        <div class="flex justify-between items-center gap-3">
            <h1 class="text-2xl font-semibold">Create Collection</h1>
        </div>

        <form class="mt-10 grid gap-5" action="{{ route('admin.collections.store') }}" method="POST">
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

            <x-input label="Name" id="name" type="text" name="name" :value="old('name')" maxlength="50" />
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <div>
                <button type="submit"
                        class="inline-block p-2 px-4 bg-primary text-primary-foreground">Save</button>
            </div>
        </form>
    </div>
</x-layouts.admin>
