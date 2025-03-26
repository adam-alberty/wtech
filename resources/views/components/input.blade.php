<div>
    <label for="{{ $id }}" class="block mb-1">{{ $label }}</label>
    <input id="{{ $id }}" name="{{ $name }}" placeholder="{{ $placeholder ?? '' }}"
        type="{{ $type ?? 'text' }}"
        class="p-3 rounded-xl border w-full focus:ring-2 ring-primary ring-offset-2 outline-none">
</div>
