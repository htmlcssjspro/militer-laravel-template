'use strict';

import getCssProperty from './get-css-property.mjs';

export default function doubleRange(id, cb = () => {}) {
    // const $range = document.getElementById(id);
    const $range = document.querySelector(`#${id}.double-range`);
    if (!$range) return;

    if (!$range) {
        console.error('Not found double-range', `[#${id}.double-range]`);
        return;
    }

    const $labels = $range.querySelector('.double-range__labels');
    const $labelMin = $labels.querySelector('label:nth-of-type(1)');
    const $labelMax = $labels.querySelector('label:nth-of-type(2)');

    const $inputs = $range.querySelector('.double-range__inputs');
    const $inputMin = $inputs.querySelector('input:nth-of-type(1)');
    const $inputMax = $inputs.querySelector('input:nth-of-type(2)');

    const $form = $inputMin.form || $inputMax.form;

    const minMin = parseInt($inputMin.getAttribute('min'), 10);
    const maxMax = parseInt($inputMax.getAttribute('max'), 10);

    let isMouseDown = false;


    // const getMin = () => {
    //     const $inputMin = $inputs.querySelector('input:nth-of-type(1)');
    //     const minVal = $inputMin.valueAsNumber;
    //     return {$inputMin, minVal};
    // };
    // const getMax = () => {
    //     const $inputMax = $inputs.querySelector('input:nth-of-type(2)');
    //     const maxVal = $inputMax.valueAsNumber;
    //     return {$inputMax, maxVal};
    // };

    const getMinMax = () => {

        // const minVal = getMin().minVal;
        // const maxVal = getMax().maxVal;

        const minVal = $inputMin.valueAsNumber;
        const maxVal = $inputMax.valueAsNumber;

        return {minVal, maxVal};
    };

    const getPos = val => val / maxMax * 100;
    const getVal = pos => pos * maxMax / 100;


    const renderVals = () => {
        const {minVal, maxVal} = getMinMax();

        $labelMin.textContent = minVal;
        $labelMax.textContent = maxVal;

        // $labelMin.textContent = getMin();
        // $labelMax.textContent = getMax();

        const left = getPos(minVal - minMin);
        const right = getPos(maxMax - maxVal);

        $inputs.style.setProperty('--track-left', `${left}%`);
        $inputs.style.setProperty('--track-right', `${right}%`);
    };

    const resetVals = () => {
        $labelMin.textContent = minMin;
        $labelMax.textContent = maxMax;
        $inputs.style.setProperty('--track-left', 0);
        $inputs.style.setProperty('--track-right', 0);
    };

    const doubleRangeHandler = event => {
        event.preventDefault();
        const type = event.type;

        const mousedown = type === 'mousedown';
        const mouseup = type === 'mouseup';
        const mousemove = type === 'mousemove';
        const mouseleave = type === 'mouseleave';

        const touchstart = type === 'touchstart';
        const touchmove = type === 'touchmove';
        const touchend = type === 'touchend';

        const isMouse =  mousedown || mouseup || mousemove || mouseleave;
        const isTouch = touchstart || touchmove || touchend;

        // mousedown && (isMouseDown = true);
        // (mouseup || mouseleave) && (isMouseDown = false);

        if (mousedown) {
            isMouseDown = true;
        }

        if (mouseup || mouseleave) {
            isMouseDown = false;
        }

        if (mouseup || mouseleave || touchend) {
            renderVals();
            cb();
        }


        if (isMouseDown || isTouch) {
            const {minVal, maxVal} = getMinMax();

            const minP = getPos(minVal);
            const maxP = getPos(maxVal);
            const center = (minP + maxP) / 2;

            // const rect = event.currentTarget.getBoundingClientRect();
            const rect = $inputs.getBoundingClientRect();

            let x;
            isMouse && (x = event.clientX - rect.x);
            isTouch && (x = event.touches[0].clientX - rect.x);

            const xP = x / rect.width * 100;

            const thumbSize = parseInt(
                getCssProperty($inputs, '--thumb-size'),
                10
            );

            const shift = thumbSize / rect.width * 100;
            const shiftVal = getVal(shift);

            if (xP < center) {
                $inputMin.value = getVal(xP);
                if (minP + shift > maxP) {
                    $inputMax.value = minVal + shiftVal;
                    // if (maxP === 100) {
                    //     $inputMin.value = maxMax - shiftVal;
                    // } else {
                    //     $inputMax.value = minVal + shiftVal;
                    // }
                }
                // minP + shift > maxP && ($inputMax.value =minVal+ shiftVal);
                // maxP === 100 && ($inputMin.value =maxVal- shiftVal);
            }
            if (xP > center) {
                $inputMax.value = getVal(xP);
                if (maxP - shift < minP) {
                    $inputMin.value = maxVal - shiftVal;
                    // if (minP === 0) {
                    //     $inputMax.value = minMin + shiftVal;
                    // } else {
                    //     $inputMin.value = maxVal - shiftVal;
                    // }
                }
                // maxP - shift < minP && ($inputMin.value =maxVal- shiftVal);
                // minP === 0 && ($inputMax.value =minVal+ shiftVal);
            }

            renderVals();
        }
    };


    ['mousedown', 'mousemove', 'mouseleave', 'mouseup', 'touchstart', 'touchmove', 'touchend']
        .forEach(eventType => {
            $inputs.addEventListener(eventType, doubleRangeHandler);
        });

    // ['mouseup', 'touchend']
    //     .forEach(eventType => {
    //         $inputs.addEventListener(eventType, () => {
    //             cb();
    //             // $form.submit();
    //         });
    //     });

    // $form.addEventListener('reset', renderVals);
    $form.addEventListener('reset', resetVals);

}
