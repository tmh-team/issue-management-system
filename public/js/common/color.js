$(() => {
    setInitialColorValue();
});

const colorInput = document.querySelector('input[name="color"]');
const colorBox = document.querySelector('input[name="color_box"]');
const invalidColor = document.querySelector("#invalid-color");

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
        colorBox.value = colorInput.value;
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
    removeColorInputFontColor();
}

/**
 * ------------------------------------------------------------
 * Set value to color box
 * ------------------------------------------------------------
 * @return {void}
 */
function setValueToColorBox() {
    const regex = /^#([0-9A-F]{6})$/i;

    if (!regex.test(colorInput.value)) {
        $(colorInput).addClass("text-danger");
        return;
    }

    colorBox.value = colorInput.value;
    removeColorInputFontColor();
}

/**
 * ------------------------------------------------------------
 * Remove color input font color
 * ------------------------------------------------------------
 * @return {void}
 */
function removeColorInputFontColor() {
    if ($(colorInput).hasClass("text-danger")) {
        $(colorInput).removeClass("text-danger");
    }
}
