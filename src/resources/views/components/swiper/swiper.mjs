import Swiper, { Navigation, Pagination, Autoplay, Scrollbar } from 'swiper';

//* Example
const exampleSlider = new Swiper('.exampleSliderSelector', {
    modules:        [Navigation, Pagination, Autoplay, Scrollbar],
    speed:          500,
    direction:      'vertical',
    slidesPerView:  1,
    spaceBetween:   30,
    centeredSlides: true,
    loop:           true,
    autoplay:       {
        delay:                2500,
        disableOnInteraction: false,
    },
    pagination: {
        el:        '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    scrollbar: {
        el: '.swiper-scrollbar',
    },
});

const sliders = () => {

    const headerSlider = new Swiper('.header-slider', {
        modules:        [Navigation, Autoplay],
        speed:          500,
        centeredSlides: true,
        loop:           true,
        // autoplay:       {
        //     delay:                2500,
        //     disableOnInteraction: false,
        // },
        navigation:     {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    const createSlider = selector => {
        const slider = new Swiper(selector, {
            modules:       [Navigation],
            speed:         500,
            slidesPerView: 4,
            spaceBetween:  20,
            navigation:    {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    };

    createSlider('.slider1');
    createSlider('.slider2');
    createSlider('.slider3');
    createSlider('.slider4');
    createSlider('.slider5');

};

export default sliders;
