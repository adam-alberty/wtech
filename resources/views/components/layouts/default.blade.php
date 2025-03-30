<x-layouts.base>
    @include('components.header')
    <main>
        {{ $slot }}
    </main>
    @include('components.footer')
</x-layouts.base>
