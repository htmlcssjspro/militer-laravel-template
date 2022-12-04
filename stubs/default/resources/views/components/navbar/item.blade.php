@props([
    'title' => false,
    'dropdown' => false,
    'dropdownItem' => false,
    'pagination' => false,
    'tabBtn' => false,
    'flex' => false,
    'grid' => false,
])

<li
    {{ $attributes->class([
        'navbar__item',
        'navbar__list-title' => $title,
        'dropdown' => $dropdown,
        'dropdown__item' => $dropdownItem,
        'pagination__item' => $pagination,
        'tab-btn' => $tabBtn,
        'flex' => $flex,
        'grid' => $grid,
    ]) }}>
    {{ $slot }}
</li>
