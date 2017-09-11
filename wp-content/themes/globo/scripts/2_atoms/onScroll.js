function onScroll() {
	scroll = $w.scrollY || $w.scrollTop();
	requestTick();
}