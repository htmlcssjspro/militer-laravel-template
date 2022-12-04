@props(['scroll' => false])

<div {{ $attributes->class(['table__body', 'scroll' => $scroll]) }}>
    {{ $slot }}
</div>
