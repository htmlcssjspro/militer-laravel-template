@props(['errors', 'put' => false, 'patch' => false, 'delete' => false])

<form {{ $attributes->class(['form'])->merge(['action' => '#', 'method' => 'POST']) }}>

    @if ($put)
        @method('PUT')
    @elseif($patch)
        @method('PATCH')
    @elseif($delete)
        @method('DELETE')
    @endif

    @csrf

    <x-form.errors />

    {{ $slot }}

</form>
