import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

import * as Func from "./functions.js";

window.Func = Func;

let app = document.getElementById("app");
app.addEventListener("click", Func.removeMenusHandler);

window.Var = {
    resized: false
}