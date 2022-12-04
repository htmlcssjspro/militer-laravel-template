@props(['block' => 'header'])

<header {{ $attributes->class(['container', 'header', $block => $block !== 'header'])->merge(['id' => 'header']) }}>
    {{ $slot }}
</header>
