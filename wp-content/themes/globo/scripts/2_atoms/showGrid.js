/* =========================
 *
 * Shows our grid system
 * When the keys ⌘ + alt + G
 * Are pressed
 *
=========================== */

var down = [];
$(document).keydown(function(e) {
    down[e.keyCode] = true;
}).keyup(function(e) {
    if (down[91] && down[18] && down[71]) {
        $html.toggleClass('grid--visible');
    }
    down[e.keyCode] = false;
});
