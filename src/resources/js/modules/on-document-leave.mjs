'use strict';

export default function onDocumentLeave(cb) {
    document.addEventListener('mouseleave', event => {
        if (event.clientY < 5) {
            cb();
        }
    });
}
