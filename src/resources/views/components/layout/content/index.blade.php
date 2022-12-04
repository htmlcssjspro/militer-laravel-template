@aware(['block'])
@props([
    'block' => null,
    'top' => false,
    'center' => false,
    'bottom' => false,
    'contentWrapper' => false,
    'flex' => false,
    'grid' => false,
])

<div
    {{ $attributes->class([
        'content',
        $block . '__content' => $block,
        $block . '__top' => $block && $top,
        $block . '__center' => $block && $center,
        $block . '__bottom' => $block && $bottom,
        'flex' => $flex && !$contentWrapper,
        'grid' => $grid && !$contentWrapper,
    ]) }}>

    @if ($contentWrapper)
        <x-layout.wrapper :flex="$flex" :grid="$grid">
            {{ $slot }}
        </x-layout.wrapper>
    @else
        {{ $slot }}
    @endif

</div>
