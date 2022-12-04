@props(['pageGroup' => 'admin'])

@push('styles')
    @vite('resources/views/pages/admin/admin.scss')
@endpush

@push('scripts')
    @vite('resources/views/pages/admin/admin.js')
@endpush

<x-app.common {{ $attributes->class(['admin', $pageGroup => $pageGroup !== 'admin']) }}>

    <x-admin.header />

    <x-layout.content>
        <h1>{{ __('Панель администратора') }}</h1>
    </x-layout.content>

    {{ $slot }}

    <x-admin.footer />

</x-app.common>
