const localization = require("@wesleyhf/laravel-localization-js");
const lang = require(`../lang/${process.env.MIX_LOCALE}.json`);
window.__ = localization.createLaravelLocalization(lang);
