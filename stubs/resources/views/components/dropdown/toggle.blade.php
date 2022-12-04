@props(['value' => null])

<div {{ $attributes->class(['dropdown__toggle']) }}>
    {{ $value ? __($value) : $slot }}
</div>
