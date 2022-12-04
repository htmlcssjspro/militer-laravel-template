@props(['legend', 'flex' => false])

<fieldset {{ $attributes }}>
    @isset($legend)
        <legend>
            {{ __($legend) }}
        </legend>
    @endisset
    @if ($flex)
        <x-layout.flex>
            {{ $slot }}
        </x-layout.flex>
    @else
        {{ $slot }}
    @endif
</fieldset>
