@aware(['block'])
@props([
    'block' => null,
    'top' => false,
    'center' => false,
    'bottom' => false,
    'wrapperContent' => false,
    'flex' => false,
    'grid' => false,
])

<div
    {{ $attributes->class([
        'wrapper',
        $block . '__wrapper' => $block,
        $block . '__top' => $block && $top,
        $block . '__center' => $block && $center,
        $block . '__bottom' => $block && $bottom,
        'flex' => $flex && !$wrapperContent,
        'grid' => $grid && !$wrapperContent,
    ]) }}>

    @if ($wrapperContent)
        <x-layout.content :flex="$flex" :grid="$grid">
            {{ $slot }}
        </x-layout.content>
    @else
        {{ $slot }}
    @endif

</div>
