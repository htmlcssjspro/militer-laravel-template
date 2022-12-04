@props(['value' => null, 'flex' => false, 'grid' => false])

<div {{ $attributes->class(['table__fdata', 'flex' => $flex, 'grid' => $grid]) }}>
    {{ $value ? __($value) : $slot }}
</div>
