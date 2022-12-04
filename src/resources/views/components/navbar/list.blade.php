@props([
    'row' => false,
    'tabs' => false,
    'pagination' => false,
    'dropdownList' => false,
    'flex' => false,
    'grid' => false,
])

<ul
    {{ $attributes->class([
        'navbar__list',
        'navbar__list_row' => $row,
        'navbar__tabs' => $tabs,
        'pagination__list' => $pagination,
        'dropdown__list' => $dropdownList,
        'flex' => $flex,
        'grid' => $grid,
    ]) }}>
    {{ $slot }}
</ul>
