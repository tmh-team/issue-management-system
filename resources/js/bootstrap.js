window.$ = window.jQuery = require("jquery");

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

require("select2");
