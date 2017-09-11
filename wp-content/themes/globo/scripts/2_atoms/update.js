function update() {
	// Do stuff here:
	if(scroll >= 32) {
		$nav.addClass('fixed light');
	} else {
		$nav.removeClass('fixed light');
	}

	if(scroll >= 408) {
		$('.secondary-navigation').addClass('fixed');
	} else {
		$('.secondary-navigation').removeClass('fixed');
	}

	ticking = false;
}