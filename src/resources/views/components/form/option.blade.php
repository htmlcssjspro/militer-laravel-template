@aware(['name'])
@props(['selected' => false, 'disabled' => false])

<option {{ $attributes }} @selected(old($name) === $attributes->get('value') ?? $selected) @disabled($disabled) >
    {{ $slot }}
</option>
