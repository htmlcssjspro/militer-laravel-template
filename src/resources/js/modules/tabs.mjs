'use strict';

export default function tabs(){
    document.body.addEventListener('click', event => {
        tabsHandler(event);
    }, false);
}

export function tabsHandler(event) {
    const t = event.target;
    const $tabBtn = t.closest('.btn_tab');
    $tabBtn && tabBtnHandler($tabBtn);
}

export function tabBtnHandler($tabBtn) {
    if($tabBtn.classList.contains('active')) return;

    const $activeTabBtn = $tabBtn.closest('nav').querySelector('.btn_tab.active');
    const $activeContent = document.querySelector('.tab-content.active');
    $activeTabBtn && $activeTabBtn.classList.remove('active');
    $activeContent && $activeContent.classList.remove('active');

    const tabID = $tabBtn.dataset.tab;
    const $content = document.querySelector(`.tab-content[data-tab=${tabID}]`);
    $tabBtn.classList.add('active');
    $content.classList.add('active');
}
