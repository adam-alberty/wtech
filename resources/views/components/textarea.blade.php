@props(['label', 'id', 'name', 'rows' => 4, 'value' => ''])

<div>
    <label for="{{ $id }}" class="block mb-1">{{ $label }}</label>
    <textarea
        id="{{ $id }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        class="p-3 rounded-xl border w-full focus:ring-2 ring-primary ring-offset-2 outline-none"
    >{{ $value }}</textarea>
</div>
