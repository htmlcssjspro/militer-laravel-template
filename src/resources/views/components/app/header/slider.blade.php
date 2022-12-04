<x-swiper class="header-slider">

    @php
        $slides = [
            'slide1' => [
                'img' => url('images/slider/slider1.png'),
                'alt' => 'slider-img',
                'title' => "Прими\rучастие в\rсоревновании",
                'link-title' => 'Максимальный урон',
                'route' => 'battles/battle1',
            ],
            'slide2' => [
                'img' => url('images/slider/slider1.png'),
                'alt' => 'slider-img',
                'title' => "Прими\rучастие в\rсоревновании",
                'link-title' => 'Максимальный урон',
                'route' => 'battles/battle2',
            ],
            'slide3' => [
                'img' => url('images/slider/slider1.png'),
                'alt' => 'slider-img',
                'title' => "Прими\rучастие в\rсоревновании",
                'link-title' => 'Максимальный урон',
                'route' => 'battles/battle3',
            ],
            'slide4' => [
                'img' => url('images/slider/slider1.png'),
                'alt' => 'slider-img',
                'title' => "Прими\rучастие в\rсоревновании",
                'link-title' => 'Максимальный урон',
                'route' => 'battles/battle4',
            ],
            'slide5' => [
                'img' => url('images/slider/slider1.png'),
                'alt' => 'slider-img',
                'title' => "Прими\rучастие в\rсоревновании",
                'link-title' => 'Максимальный урон',
                'route' => 'battles/battle5',
            ],
        ];
    @endphp

    @foreach ($slides as $name => $slide)
        <x-swiper.slide>
            <img src="{{ $slide['img'] }}" alt="{{ $slide['alt'] }}">
            <h2 class="title">{{ $slide['title'] }}</h2>
            {{-- <x-link :href="route($slide['route']) ?? '#'" class="btn btn_slider" :value="$slide['link-title']" /> --}}
            <x-link class="btn btn_slider" :value="$slide['link-title']" />
        </x-swiper.slide>
    @endforeach

    <x-slot:navigation>
        <x-swiper.btn-prev>
            <x-svg.symbol href="caret-left" white width="21" height="37" />
        </x-swiper.btn-prev>
        <x-swiper.btn-next>
            <x-svg.symbol href="caret-right" white width="21" height="37" />
        </x-swiper.btn-next>
    </x-slot:navigation>

</x-swiper>
