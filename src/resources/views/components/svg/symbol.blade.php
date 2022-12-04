@props(['href', 'black' => false, 'white' => false])

<svg
    {{ $attributes->class(['svg-symbol', $href, 'svg-symbol_black' => $black, 'svg-symbol_white' => $white])->merge(['width' => '1.5em', 'height' => '1em']) }}>
    <use href="{{ url("images/svg/sprite.svg#{$href}") }}" />
</svg>


{{-- Example

<x-svg.symbol href="symbol" class="symbol" />

endExample --}}
