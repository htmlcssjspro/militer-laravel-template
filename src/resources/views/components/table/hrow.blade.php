@props(['flex' => false, 'grid' => false])

<div
    {{ $attributes->class([
        'table__hrow',
        'flex' => $flex,
        'grid' => $grid,
    ]) }}>
    {{ $slot }}
</div>
