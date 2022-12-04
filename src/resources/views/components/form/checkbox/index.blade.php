@props(['id', 'name', 'inputValue' => true, 'checked' => false, 'labelValue', 'flex' => false])

{{-- <div {{ $atributes->class(['checkbox']) }}> --}}
<div class="checkbox">

    <x-form.input-checkbox id="{{ $id }}" name="{{ $name }}" value="{{ $inputValue }}"
        class="checkbox__input" :checked="is_array(old(str_replace('[]', '', $name)))
            ? in_array($inputValue, old(str_replace('[]', '', $name)))
            : old($name, $checked)" />

    <x-form.label for="{{ $id }}" class="checkbox__label" :flex="$flex">

        {{ $slot }}

        @isset($labelValue)
            <span>{{ __($labelValue) }}</span>
        @endisset

    </x-form.label>

</div>

{{-- Example

<x-form.checkbox id="input-id" name="input-name" input-value="input-value">
    Content
    <span>{{ __('Label') }}</span>
</x-form.checkbox>

<x-form.checkbox id="input-id" name="input-name" input-value="input-value" label-value="Label">
    Content
</x-form.checkbox>

<x-form.checkbox id="input-id" name="input-name" input-value="input-value" label-value="Label" />

endExample --}}
