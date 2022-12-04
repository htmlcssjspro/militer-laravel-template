'use strict';

import {anchorHandler} from './anchor-handler.mjs';
import {buttonHandler} from './button-handler.mjs';
import {toggleHandler} from './dropdown.mjs';

export default function clickHandler(data = {}) {
    document.body.addEventListener('click', event => {
        event.preventDefault();
        const t = event.target;

        anchorHandler(t);
        buttonHandler(t, data);
        toggleHandler(t);

    }, false);
}
