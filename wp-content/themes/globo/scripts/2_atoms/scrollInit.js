if(isDesktop() & !$body.hasClass('ie-lte-9')) {
	window.addEventListener('scroll', onScroll, false);
	
	update();
}
