@props(['value' => null, 'disabled' => false])

<button {{ $attributes->class(['btn'])->merge(['type' => 'button']) }} @disabled($disabled) >
    {{ $value ? __($value) : $slot }}
</button>
