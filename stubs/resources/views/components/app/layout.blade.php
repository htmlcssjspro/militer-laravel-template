@props(['pageGroup' => 'app'])

@prepend('styles')
    {{-- @vite('resources/views/components/app/app.scss') --}}
@endprepend

@prepend('scripts')
    @vite('resources/js/app.js')
    {{-- @vite('resources/views/components/app/app.js') --}}
@endprepend

<x-layout {{ $attributes->class(['app', $pageGroup => $pageGroup !== 'app', 'grid', 'scrollbar']) }}>

    @if (session()->has('error'))
        <x-layout.content class="notification error">
            <span class="notification__message error__message">{{ session('error') }}</span>
        </x-layout.content>
    @endif
    @if (session()->has('success'))
        <x-layout.content class="notification success">
            <span class="notification__message success__message">{{ session('success') }}</span>
        </x-layout.content>
    @endif
    @if (session()->has('warning'))
        <x-layout.content class="notification warning">
            <span class="notification__message warning__message">{{ session('warning') }}</span>
        </x-layout.content>
    @endif
    @if (session()->has('info'))
        <x-layout.content class="notification info">
            <span class="notification__message info__message">{{ session('info') }}</span>
        </x-layout.content>
    @endif

    <x-app.header />

    {{ $slot }}

    <x-app.footer />

    <x-app.app-test.test />

    {{-- @env('local')
    <x-layout.design-grid />
    @endenv --}}

</x-layout>
