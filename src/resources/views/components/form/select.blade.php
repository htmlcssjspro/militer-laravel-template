@props(['name', 'multiple' => false, 'labelValue' => null, 'flex' => false, 'grid' => false])

@if ($labelValue)
    <x-form.label :value="$labelValue" :flex="$flex" :grid="$grid">

        <select {{ $attributes->merge(['name' => $name]) }} @multiple($multiple)>
            {{ $slot }}
        </select>

    </x-form.label>
@else
    <select {{ $attributes->merge(['name' => $name]) }} @multiple($multiple)>
        {{ $slot }}
    </select>
@endif
