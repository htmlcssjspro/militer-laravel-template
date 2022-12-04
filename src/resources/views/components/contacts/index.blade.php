@props([
    'email' => 'militer@htmlcssjs.pro',
    'telegram' => '@militer_htmlcssjspro',
])

<x-navbar.list class="contacts contacts_footer">

    <x-navbar.item title class="contacts__item contacts__item_footer t-16 mb-2">
        <x-link value="Контакты" class="text-grey" />
    </x-navbar.item>

    <x-navbar.item class="contacts__item contacts__item_footer mb-1">
        <x-link href="mailto:{{ $email }}" :value="$email" />
    </x-navbar.item>

    <x-navbar.item class="contacts__item contacts__item_footer">
        <x-link href="tg://resolve?domain={{ $telegram }}" :value="$telegram" />
    </x-navbar.item>

</x-navbar.list>
