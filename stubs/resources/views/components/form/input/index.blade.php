@props([
    'value' => null,
    'labelValue' => null,
    'required' => false,
    'autofocus' => false,
    'disabled' => false,
    'checked' => false,
    'flex' => false,
    'grid' => false,
])

@if ($labelValue)
    <x-form.label :value="$labelValue" :flex="$flex" :grid="$grid">
        <input {{ $attributes }} value="{{ old($attributes->get('name'), $value) }}" @checked($checked)
            @disabled($disabled) @required($required) @autofocus($autofocus) />
    </x-form.label>
@else
    <input {{ $attributes }} value="{{ old($attributes->get('name'), $value) }}" @checked($checked)
        @disabled($disabled) @required($required) @autofocus($autofocus) />
@endif


{{-- Example

<x-form.input id="" type="" name="" class=""/>
<x-form.input {{ $attributes->merge(['type' => 'type']) }} />

endExample --}}
