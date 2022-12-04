@props(['pageGroup' => 'post'])

<x-app.layout {{ $attributes->class([
    'post',
    $pageGroup => $pageGroup !== 'post',
]) }}>
    {{ $slot }}
</x-app.layout>
