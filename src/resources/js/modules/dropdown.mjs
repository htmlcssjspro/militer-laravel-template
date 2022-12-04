'use strict';

export default function dropdown(){
    document.body.addEventListener('click', dropdownHandler, false);
}

export function dropdownHandler(event) {
    const t = event.target;

    const $toggle = t.closest('.dropdown .dropdown__toggle');
    $toggle
        ? dropdownToggleHandler($toggle)
        : dropdownReset();

    const $filterToggle = t.closest('.dropdown-filter .dropdown-filter__toggle');
    $filterToggle && dropdownFilterHandler($filterToggle);

    const $menuToggle = t.closest('.navbar .navbar__item.dropdown-menu .dropdown-menu__toggle');
    $menuToggle
        ? dropdownMenuHandler($menuToggle)
        : dropdownMenuReset();
}

export function dropdownToggleHandler($toggle) {
    const $dropdown = $toggle.closest('.dropdown');
    const $content = $dropdown.querySelector('.dropdown__content');
    const $list = $dropdown.querySelector('.dropdown__list');
    const $menu = $dropdown.querySelector('.dropdown__menu');

    if ($toggle.classList.contains('show')) {
        $toggle.classList.remove('show');
        $content && $content.classList.remove('show');
        $list && $list.classList.remove('show');
        $menu && $menu.classList.remove('show');
    }else {
        dropdownReset();
        $toggle.classList.add('show');
        $content && $content.classList.add('show');
        $list && $list.classList.add('show');
        $menu && $menu.classList.add('show');
    }
}

export function dropdownReset() {
    const $toggleShow = document.querySelector('.dropdown .dropdown__toggle.show');
    $toggleShow && $toggleShow.classList.remove('show');
    const $contentShow = document.querySelector('.dropdown .dropdown__content.show');
    $contentShow && $contentShow.classList.remove('show');
    const $listShow = document.querySelector('.dropdown .dropdown__list.show');
    $listShow && $listShow.classList.remove('show');
    const $menuShow = document.querySelector('.dropdown .dropdown__menu.show');
    $menuShow && $menuShow.classList.remove('show');
}


export function dropdownFilterHandler($filterToggle) {
    const $dropdown = $filterToggle.closest('.dropdown-filter');
    const $content = $dropdown.querySelector('.dropdown-filter__content');
    $filterToggle.classList.toggle('hide');
    $content && $content.classList.toggle('hide');
}

export function dropdownMenuHandler($menuToggle) {
    const $dropdown = $menuToggle.closest('.dropdown-menu');
    const $dropdownMenu = $dropdown.querySelector('.dropdown-menu__menu');
    if ($dropdownMenu) {
        if ($dropdownMenu.classList.contains('show')) {
            $dropdownMenu.classList.remove('show');
        } else {
            dropdownMenuReset();
            $dropdownMenu.classList.add('show');
        }
    } else dropdownMenuReset();
}

export function dropdownMenuReset() {
    // const $active = document.querySelector('.dropdown .dropdown__toggle.active');
    // $active && $active.classList.remove('active');
    const $show = document.querySelector('.dropdown-menu .dropdown-menu__menu.show');
    $show && $show.classList.remove('show');
}
