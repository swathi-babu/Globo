var $btt = $('#btt');

$btt.on('click', function(e) {
	e.preventDefault();
	var scrollPerSecond = 2000,
		bttScroll 		= $w.scrollTop(),
		bttSpeed 		= bttScroll/(scrollPerSecond/1000);

	$('body, html').animate({'scrollTop': 0}, bttSpeed);
});