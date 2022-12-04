@props(['metaTitle' => 'Title', 'metaDescription' => 'Description'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __($metaTitle) }}</title>
    <meta name="description" content="{{ __($metaDescription) }}">
    <meta name="author" content="Sergei MILITER https://htmlcssjs.pro militer@htmlcssjs.pro">

    <livewire:styles />

    @stack('vendor-styles')
    @stack('styles')

    @stack('vendor-scripts')
    @stack('scripts')
</head>

<body {{ $attributes->class(['body']) }}>

    @if (session()->has('error'))
        <x-layout.content class="notification error">
            <span class="error">{{ session('error') }}</span>
        </x-layout.content>
    @endif
    @if (session()->has('success'))
        <x-layout.content class="notification success">
            <span class="success">{{ session('success') }}</span>
        </x-layout.content>
    @endif
    @if (session()->has('message'))
        <x-layout.content class="notification message">
            <span class="message">{{ session('message') }}</span>
        </x-layout.content>
    @endif
    @if (session()->has('info'))
        <x-layout.content class="notification info">
            <span class="info">{{ session('info') }}</span>
        </x-layout.content>
    @endif

    {{ $slot }}

    <livewire:scripts />
</body>

</html>
