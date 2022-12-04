@aware(['errors'])

@if ($errors && $errors->any())
    <div {{ $attributes->class(['form__errors']) }}>
        <span class="errors-title">
            {{ __('Что-то пошло не так...') }}
        </span>

        <ul class="">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Example

<x-form.errors class="" :errors="$errors" />

endExample --}}
