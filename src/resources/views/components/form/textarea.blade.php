@props([
    'labelValue' => null,
    'flex' => false,
    'grid' => false,
])

@if ($labelValue)
    <x-form.label :value="$labelValue" :flex="$flex" :grid="$grid">
        <textarea {{ $attributes->merge(['rows' => 5]) }}>
            {{ old($attributes->get('name')) ?? $slot }}
        </textarea>
    </x-form.label>
@else
    <textarea {{ $attributes->merge(['rows' => 5]) }}>
        {{ old($attributes->get('name')) ?? $slot }}
    </textarea>
@endif
