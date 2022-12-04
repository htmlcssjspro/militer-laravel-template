'use strict';

export default function accordion(id) {
    const $accordion = document.querySelector(`#${id}.accordion`);
    if (!$accordion) {
        console.error('Not found accordion', `[#${id}.accordion]`);
        return;
    }

    $accordion.addEventListener('click', accordionHandler, false);
}

export function accordionHandler(event) {
    const $accordion = event.currentTarget;
    const t = event.target;

    const $toggle = t.closest('.accordion .accordion__toggle');
    $toggle && accordionToggleHandler($accordion, $toggle);
}

export function accordionToggleHandler($accordion, $toggle) {
    const $item = $toggle.closest('.accordion .accordion__item');
    const $content = $item.querySelector('.accordion__content');

    if ($toggle.classList.contains('show')) {
        $toggle.classList.remove('show');
        $content && $content.classList.remove('show');
    }else {
        accordionReset($accordion);
        $toggle.classList.add('show');
        $content && $content.classList.add('show');
    }
}

export function accordionReset($accordion) {
    const $toggleShow = $accordion.querySelector('.accordion__toggle.show');
    $toggleShow && $toggleShow.classList.remove('show');
    const $contentShow = $accordion.querySelector('.accordion__content.show');
    $contentShow && $contentShow.classList.remove('show');
}
