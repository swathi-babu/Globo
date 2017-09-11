// Uses svgMagick to generate
// fallback svg images on the
// fly. Only works for <img> and
// background images, not for <use>

$(document).ready(function() {
	$('img.type-svg').svgmagic({
		forceReplacements: true,
		// debug: true
	});
});