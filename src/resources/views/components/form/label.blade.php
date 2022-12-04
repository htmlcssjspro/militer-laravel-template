@props(['value' => null, 'flex' => false, 'grid' => false])

<label {{ $attributes->class(['label', 'flex' => $flex, 'grid' => $grid]) }}>

    @isset($value)
        <span class="label-value">{{ __($value) }}</span>
    @endisset

    {{ $slot }}

</label>
