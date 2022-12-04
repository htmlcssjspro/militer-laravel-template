@aware(['page' => null])
@props(['block' => 'main'])

<main
    {{ $attributes->class([
            'main',
            $block => $block !== 'main',
            $page . '__main' => $page,
        ])->merge(['id' => 'main']) }}>

    {{ $slot }}

</main>
