'use strict';

export default function getCssProperty($element, property) {
    const compStyles = window.getComputedStyle($element);
    const propertyValue = compStyles.getPropertyValue(property);
    return propertyValue;
}
