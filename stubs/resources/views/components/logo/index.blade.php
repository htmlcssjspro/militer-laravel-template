<div {{ $attributes->class(['logo']) }}>
    <x-link href="{{ route('home') }}" flex>
        {{ $slot }}
    </x-link>
</div>
