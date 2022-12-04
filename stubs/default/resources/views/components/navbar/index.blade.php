@props(['list' => false, 'row' => false, 'flex' => false, 'grid' => false])

<nav {{ $attributes->class(['navbar', 'navbar_row' => $row, 'flex' => $flex, 'grid' => $grid]) }}>
    @if ($list)
        <x-navbar.list>
            {{ $slot }}
        </x-navbar.list>
    @else
        {{ $slot }}
    @endif
</nav>
