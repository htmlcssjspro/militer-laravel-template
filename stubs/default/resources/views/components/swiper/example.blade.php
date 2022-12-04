{{-- Slider main container --}}
<x-swiper class="slider" pagination navigation scrollbar>
    {{-- Additional required wrapper --}}
    {{-- Slides --}}
    <x-swiper.slide>
        {{-- Slide content --}}
    </x-swiper.slide>
    <x-swiper.slide>
        {{-- Slide content --}}
    </x-swiper.slide>
    <x-swiper.slide>
        {{-- Slide content --}}
    </x-swiper.slide>

    {{-- <!-- If we need navigation buttons --> --}}
    <x-slot:navigation>
        <x-swiper.btn-prev />
        <x-swiper.btn-next />
    </x-slot:navigation>
    <x-slot:navigation>
        <x-swiper.btn-prev></x-swiper.btn-prev>
        <x-swiper.btn-next></x-swiper.btn-next>
    </x-slot:navigation>

</x-swiper>
