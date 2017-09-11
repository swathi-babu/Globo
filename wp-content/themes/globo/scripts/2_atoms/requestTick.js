function requestTick() {
	if(!ticking) {
		requestAnimationFrame(update);
		ticking = true;
	}
}