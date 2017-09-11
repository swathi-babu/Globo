(function() {
	(function($) {
var $html = $('html');
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

var $hamburger = $('.primary-navigation__item--hamburger a');

$hamburger.on('click',function(e) {
	e.preventDefault();
	$html.toggleClass('menu--open');
});
var init = function() {
FastClick.attach(document.body);
};
		init();
	})(jQuery);
}(window));