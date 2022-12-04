@props(['value' => null, 'flex' => false, 'grid' => false])

<div {{ $attributes->class(['table__hdata', 'flex' => $flex, 'grid' => $grid]) }}>
    {{ $value ? __($value) : $slot }}
</div>
