<x-layouts.admin>
    <div class="m-10">
        <div class="flex justify-between items-center gap-3">
            <h1 class="text-2xl font-semibold">Sizes</h1>
            <a href="{{ route('admin.sizes.create') }}"
               class="inline-block p-2 px-4 bg-primary text-primary-foreground">New Size</a>
        </div>

        <table class="mt-10 w-full">
            <thead>
            <tr class="text-left">
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Size Name</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="text-left">
            @foreach ($sizes as $size)
                <tr class="border-b">
                    <td class="w-10 py-2 px-4">{{ $size->id }}</td>
                    <td class="py-2 px-4">{{ $size->name }}</td>
                    <td class="w-20">
                        <div class="flex gap-7">
                            <a href="{{ route('admin.sizes.edit', $size->id) }}"
                             class="flex gap-3 items-center">
                                <x-phosphor-pen class="w-5 h-5" />
                                <span>Edit</span>
                            </a>
                            <form action="{{ route('admin.sizes.destroy', $size->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="flex gap-3 items-center text-red-500">
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
