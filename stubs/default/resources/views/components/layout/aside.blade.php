@aware(['page' => null])
@props(['master' => 'aside', 'top' => null, 'bottom' => null])

<x-layout.container
    {{ $attributes->class([
            'aside' => $master !== 'aside',
            $page . '__aside' => $page,
        ])->merge(['id' => 'aside']) }}
    :master="$master" tag="aside">

    <x-slot:top>
        {{ $top }}
    </x-slot:top>

    {{ $slot }}

    <x-slot:bottom>
        {{ $bottom }}
    </x-slot:bottom>

</x-layout.container>

<x-layout.container
    {{ $attributes->class([
            'aside' => $master !== 'aside',
            $page . '__aside' => $page,
        ])->merge(['id' => 'aside']) }}
    :master="$master" tag="aside">

    <x-slot:top>
        {{ $top }}
    </x-slot:top>

    {{ $slot }}

    <x-slot:bottom>
        {{ $bottom }}
    </x-slot:bottom>

</x-layout.container>
