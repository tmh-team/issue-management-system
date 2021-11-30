/**
 * --------------------------------------------------
 * Get color
 * --------------------------------------------------
 */
function getColorValue() {
    $('input[name="color"]').val($('input[type="color"]').val());
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
    $('input[type="color"]').val($(el).val());
}
