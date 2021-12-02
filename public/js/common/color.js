$(() => {
    setInitialColorValue();
});

const colorInput = document.querySelector('input[name="color"]');
const colorBox = document.querySelector('input[name="color_box"]');
const invalidColor = document.querySelector("#invalid-color");
const regexFull = /^#([a-f\d]{3}|[a-f\d]{6})$/i; //For color code (#hex) with 3 || 6 digits
const regexHalf = /^#([a-f\d]{3})$/i; //For color code (#hex) with 3 digits

/**
 * ------------------------------------------------------------
 * Set initial color value to both color box and input
 * ------------------------------------------------------------
 * @return {void}
 */
function setInitialColorValue() {
    if (invalidColor) {
        $(colorInput).addClass("text-danger");
        return;
    }
    if (colorInput.value) {
        colorBox.value = regexHalf.test(colorInput.value)
            ? convertToFullColorCode(colorInput.value)
            : colorInput.value;
        return;
    }
    setValueToColorInput();
}

/**
 * ------------------------------------------------------------
 * Set value to color input
 * ------------------------------------------------------------
 * @return {void}
 */
function setValueToColorInput() {
    colorInput.value = colorBox.value;
    removeColorInputTextColor();
}

/**
 * ------------------------------------------------------------
 * Set value to color box
 * ------------------------------------------------------------
 * @return {void}
 */
function setValueToColorBox() {
    if (!regexFull.test(colorInput.value)) {
        $(colorInput).addClass("text-danger");
        return;
    }
    colorBox.value = regexHalf.test(colorInput.value)
        ? convertToFullColorCode(colorInput.value)
        : colorInput.value;
    removeColorInputTextColor();
}

/**
 * ------------------------------------------------------------
 * Remove color input font color
 * ------------------------------------------------------------
 * @return {void}
 */
function removeColorInputTextColor() {
    if ($(colorInput).hasClass("text-danger")) {
        $(colorInput).removeClass("text-danger");
    }
}

/**
 * ------------------------------------------------------------
 * Convert to full color code (e.g #bcd to #bbccdd)
 * ------------------------------------------------------------
 * @param {string} hex
 * @return {string}
 */
function convertToFullColorCode(hex) {
    return hex.replace(
        /^#?([a-f\d])([a-f\d])([a-f\d])$/i,
        (h, r, g, b) => `#${r + r + g + g + b + b}`
    );
}
