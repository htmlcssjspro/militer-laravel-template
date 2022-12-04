@push('styles')
    @vite('resources/views/pages/home/home.scss')
@endpush

@push('scripts')
    @vite('resources/views/pages/home/home.js')
@endpush

{{-- <x-app.layout :metaTitle="$metaTitle" :metaDescription="$metaDescription"> --}}
<x-app.layout metaTitle="Home Page" metaDescription="Home Page Description">
    <x-layout.container page="home">
        <x-layout.main>
            <x-layout.content>
                Home Page
            </x-layout.content>
        </x-layout.main>
    </x-layout.container>
</x-app.layout>
