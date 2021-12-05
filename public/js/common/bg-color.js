(() => {
    /**
     * ------------------------------------------------------------
     * HEX to RGB function
     * ------------------------------------------------------------
     * @return {Array}
     */
    function hexToRgb(hex) {
        return hex
            .substring(1)
            .match(/.{2}/g)
            .map((x) => parseInt(x, 16));
    }

    /**
     * ------------------------------------------------------------
     * Determine luminance of relation in color
     * Notes:
     * 1. Luminance is a measure to describe the perceived brightness of a color.
     * 2. Formula: https://www.w3.org/TR/WCAG20/#relativeluminancedef
     * ------------------------------------------------------------
     * @param {number} r
     * @param {number} g
     * @param {number} b
     * @return {number}
     */
    function luminance(r, g, b) {
        const L = [r, g, b].map((color) => {
            color /= 255;
            return color <= 0.03928
                ? color / 12.92
                : ((color + 0.055) / 1.055) ** 2.4;
        });

        return L[0] * 0.2126 + L[1] * 0.7152 + L[2] * 0.0722;
    }

    const elements = document.querySelectorAll("[data-bg-color]");
    elements.forEach((el) => {
        let color = el.dataset.bgColor;
        const rgb = hexToRgb(color);
        const L = luminance(...rgb);
        el.style.backgroundColor = color;
        el.style.color = L < 0.228 ? "#FFFFFF" : "#000000";
    });
})();
