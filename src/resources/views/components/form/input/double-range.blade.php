@props(['id', 'form', 'min', 'max', 'step'])

<div {{ $attributes->class(['double-range'])->merge(['id' => $id]) }}>
    <div class="double-range__labels flex">
        <label for="{{ $id }}-min" class="double-range__label">{{ $min }}</label>
        <span>-</span>
        <label for="{{ $id }}-max" class="double-range__label">{{ $max }}</label>
    </div>
    <div id="double-range-inputs" class="double-range__inputs">
        <input type="range" id="{{ $id }}-min" form={{ $form }} name="{{ $id }}-min"
            min="{{ $min }}" max="{{ $max }}" step="{{ $step }}" value="{{ $min }}">
        <input type="range" id="{{ $id }}-max" form={{ $form }} name="{{ $id }}-max"
            min="{{ $min }}" max="{{ $max }}" step="{{ $step }}" value="{{ $max }}">
    </div>
</div>
