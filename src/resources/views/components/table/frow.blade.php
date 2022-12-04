@props(['flex' => false, 'grid' => false])

<div
    {{ $attributes->class([
        'table__frow',
        'flex' => $flex,
        'grid' => $grid,
    ]) }}>
    {{ $slot }}
</div>
