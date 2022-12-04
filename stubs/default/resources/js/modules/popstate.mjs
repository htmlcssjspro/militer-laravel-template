'use strict';

import newFetch from './fetch.mjs';

export default function popstate() {
    window.addEventListener('popstate', () => newFetch(history.state));
}
