<x-layouts.admin>
    <div class="m-10">
        <div class="flex justify-between items-center gap-3">
            <h1 class="text-2xl font-semibold">Collections</h1>
            <a href="{{ route('admin.collections.create') }}"
               class="inline-block p-2 px-4 bg-primary text-primary-foreground">New Collection</a>
        </div>

        <table class="mt-10 w-full">
            <thead>
                <tr class="text-left">
                    <th class="py-2 px-4">ID</th>
                    <th class="py-2 px-4">Collection Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-left">
                @foreach ($collections as $collection)
                    <tr class="border-b">
                        <td class="w-10 py-2 px-4">{{ $collection->id }}</td>
                        <td class="py-2 px-4">{{ $collection->name }}</td>
                        <td class="w-20">
                            <div class="flex gap-7">
                                <a href="{{ route('admin.collections.edit', $collection->id) }}"
                                   class="flex gap-3 items-center">
                                    <x-phosphor-pen class="w-5 h-5" />
                                    <span>Edit</span>
                                </a>
                                <form action="{{ route('admin.collections.destroy', $collection->id) }}" method="POST">
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
