<x-form.input {{ $attributes->merge(['type' => 'checkbox']) }} />

{{-- <x-form.input {{ $attributes->merge(['type' => 'checkbox']) }} :checked="is_array(old($attributes->get('name')))
    ? in_array($attributes->get('value'), old($attributes->get('name')))
    : old($attributes->get('name'), $checked)" /> --}}

{{-- {{ (old($attributes->get('name')) || $checked) ? 'checked' : '' }} --}}

{{-- Example

<x-form.input-checkbox id="" name="" class=""/>

endExample --}}
