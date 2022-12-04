@props(['flex' => false, 'grid' => false])

<div
    {{ $attributes->class([
        'table__row',
        'flex' => $flex,
        'grid' => $grid,
    ]) }}>
    {{ $slot }}
</div>
