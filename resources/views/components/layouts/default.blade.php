<x-layouts.base>
    @include('components.header')
    {{ $slot }}
    @include('components.footer')
</x-layouts.base>
