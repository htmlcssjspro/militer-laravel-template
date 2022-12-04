@props([
    'page' => null,
    'block' => null,
    'content' => false,
    'wrapper' => false,
    'flex' => false,
    'grid' => false,
])

<section
    {{ $attributes->class([
        'container',
        'page-container' => $page,
        $page => $page,
        $block => $block,
    ]) }}>

    @if ($content)
        <x-layout.content :flex="$flex" :grid="$grid">
            {{ $slot }}
        </x-layout.content>
    @elseif($wrapper)
        <x-layout.wrapper :flex="$flex" :grid="$grid">
            {{ $slot }}
        </x-layout.wrapper>
    @else
        {{ $slot }}
    @endif

</section>
