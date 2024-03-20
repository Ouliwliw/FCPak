// bootstrap.js, pour le démarrage de l'app, créé par Laravel
import './bootstrap';

// Bootstrap, la librairie HTML/CSS/JS
import 'bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//SEE https://github.com/alpinejs/alpine/pull/2063
// Permet la compatibilité entre JQuery et Alpine
document.addEventListener("alpine:init", () => {
    Alpine.setListenerManipulators(
        (target, event, handler, options, modifiers) => {
            jQuery(target).on(event, handler);
        },
        (target, event, handler, options) => {
            jQuery(target).off(event, handler);
        }
    );
});

/* EXAMPLE: 
    <span @click="val='new'" x-text="val"></span>
    <button onclick="$('span').trigger('click')">Update</button>
*/    
