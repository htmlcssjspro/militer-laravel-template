'use strict';


export default class Cookie {

    constructor(name, value, options: {}) {
        this.name = name;
        this.value = value;
        this.options = options;
    }

    static get all() {
        return document.cookie;
    }

    static get array(){
        return decodeURIComponent(this.all).split(';');
    }

    get value(name) {

    }

    set(name, value, options = {}) {
        options['max-age'] ??= 60 * 60 * 24 * 7; //* max-age-in-seconds (e.g., 60 * 60 * 24 * 365 or 31536000 for a year)
        options.expires ??= ''; //* date-in-GMTString-format (e.g., Thu, 01 Jan 1970 00:00:00 GMT), use Date.toUTCString()
        options.path ??= '/';
        // options.domain ??= 'site.com';
        options.samesite ??= true;
        options.secure ??= true;

        if (options.expires instanceof Date) {
            options.expires = options.expires.toUTCString();
        }

        const format = string => encodeURIComponent(string);

        let newCookie = `${format(name)}=${format(value)}`;

        for (let key in options) {
            let value = options[key];
            newCookie += `; ${key}`;
            if (value !== true) {
                newCookie += `=${value}`;
            }
        }

        document.cookie = newCookie;

        return newCookie;
    }

    del(name) {
        this.set(name, '', {expires: -1});
        // * OR
        document.cookie = `${name}=; expires=Thu, 01 Jan 1970 00:00:00 GMT`;
        // * OR
        document.cookie = `${name}=; expires=-1`;
    }


    isSet(name) {}
    isSetToValue(cookieString) {
        const cookieArray = document.cookie.split(';');
        const isCookieSetToValue = cookieArray.filter(cookie => {
            return cookie.includes(cookieString);
        }).length;
        return isCookieSetToValue;
    }
}
