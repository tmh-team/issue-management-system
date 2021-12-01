/**
 * --------------------------------------------------
 * Get color
 * --------------------------------------------------
 */
function getColorValue() {
    $('#color-code').val($('#color').val());
}
getColorValue();

/**
 * --------------------------------------------------
 * Change color
 * --------------------------------------------------
 * @param {object} element
 * @return {void}
 */
function changeColorValue(el) {
    const regex = /^#([0-9A-F]{6})$/i;

    if (!regex.test(el.value)) {
        $(el).css("color", "red");
        return;
    }

    $(el).css("color", "");
    $('#color-code').val($(el).val());
}
