@props(['pageGroup' => 'posts'])

<x-app.layout {{ $attributes->class([
    'posts',
    $pageGroup => $pageGroup !== 'posts',
]) }}>
    {{ $slot }}
</x-app.layout>
