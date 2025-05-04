<div>
    <label for="{{ $id }}" class="block mb-1">{{ $label }}</label>
    <textarea id="{{ $id }}" name="{{ $name }}" type="{{ $type ?? 'text' }}" rows="{{ $rows }}"
        class="p-3 rounded-xl border w-full focus:ring-2 ring-primary ring-offset-2 outline-none"></textarea>
</div>
