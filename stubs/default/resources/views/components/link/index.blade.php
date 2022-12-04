@props(['value' => null, 'flex' => false])

<a
    {{ $attributes->class(['link', 'flex' => $flex, 'active' => $attributes->get('href') === url()->current()])->merge(['href' => '#']) }}>
    {{ $value ? __($value) : $slot }}
</a>
