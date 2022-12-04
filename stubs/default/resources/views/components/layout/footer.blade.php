@props(['block' => 'footer'])

<footer {{ $attributes->class(['container', 'footer', $block => $block !== 'footer'])->merge(['id' => 'footer']) }}>
    {{ $slot }}
</footer>
