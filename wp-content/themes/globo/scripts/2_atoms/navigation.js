var $hamburger 		= $('.primary-navigation__item--hamburger a'),
	$searchLink		= $('.search__link'),
	$searchDismiss	= $('.search-form__dismiss');

$hamburger.on('click',function(e) {
	e.preventDefault();
	$html.toggleClass('menu--open');
});

$searchLink.on('click', function(e) {
	e.preventDefault();
	if(!$html.hasClass('search--open')) {
		$html.addClass('search--open');
	}
});

$searchDismiss.on('click', function(e) {
	e.preventDefault();
	if($html.hasClass('search--open')) {
		$html.removeClass('search--open');
	}
});