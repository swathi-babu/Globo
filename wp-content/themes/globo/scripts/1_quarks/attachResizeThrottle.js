/* Attach our resizeThrottle function */
$(window).on('resize orientationChanged', function() {
	ww = $w.width();
	clearTimeout(resized);
	resized = setTimeout(resizeThrottle, 400);
});