@props(['page' => 'admin'])

<x-admin.common {{ $attributes }}>

    <x-layout.container :page="$page" wrapper grid>
        <x-admin.aside />

        {{ $slot }}

    </x-layout.container>

</x-admin.common>
