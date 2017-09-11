var $taxControls		= $('.two-taxonomy__control'),
	$filterPartners		= $('#filter-partners'),
	$sliderWrap			= $('.partners-slider .slider-wrap'),
	sliderClass			= $('.partners-slider').attr('class'),
	sliderIDStart		= sliderClass.indexOf('initted'),
	sliderID			= sliderClass.slice(sliderIDStart, (sliderIDStart + 16));

$filterPartners.on('click', function(e) {
	e.preventDefault();

	var location	= $('select[data-taxonomy="partner_location"]').val(),
		type		= $('select[data-taxonomy="partner_type"]').val();

	if(location == '' || type == '') {
		return;
	}

	$partnersArgs = {
		'query-location': location,
		'query-type': type,
	};

	partnersAjaxLoop($partnersArgs);
});

function partnersAjaxLoop(args) {
	$.ajax({
		type: 'GET',
		url: 'http://localhost:8888/wp-content/themes/globo/partials/ajax_helper.php',
		data: $partnersArgs,
	})
	.done(function(res) {
		$sliderWrap.html(res);
		sName.rebuild();
	})
	.fail(function(err) {
		console.log(err);
	});
}