'use strict';

export default function inputFile(){
    document.body.addEventListener('click', inputFileHandler, false);
}

export function inputFileHandler(event) {
    const t = event.target;

    const $labelFile = t.closest('.label-file');
    $labelFile && labelFileHandler($labelFile);
}

export function labelFileHandler($labelFile) {
    const $fileInput = $labelFile.querySelector('input[type=file]');
    const $image = $labelFile.querySelector('.label-file__img');
    const $filename = $labelFile.querySelector('.label-file__filename');
    const $form = $fileInput.form;

    $fileInput && $fileInput.addEventListener('change', event => {
        const ct = event.currentTarget;

        if (!ct.files || !ct.files[0]) return;
        const file = ct.files[0];

        $filename.textContent = file.name;

        const fr = new FileReader();
        fr.onload = event => {
            $image.style.backgroundImage = `url(${fr.result})`;
        };
        fr.readAsDataURL(file);
    });

    const resetFile = () => {
        $filename.textContent = 'Файл не выбран';
        $image.style.backgroundImage = '';
    };

    $form.addEventListener('reset', resetFile);
}
