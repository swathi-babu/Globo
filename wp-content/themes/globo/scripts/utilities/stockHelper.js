var $investors			= $('a.submenu-link:contains("Investors")'),
	$investorsParents	= $investors.parent('.submenu-item '),
	stockTemplate		= '<div class="stock-price__background"></div><div class="stock-price__indicator"><div class="stock-price__label">Share Price</div><div class="stock-price__info"><span class="stock-price__unit">GBX</span><span class="stock-price__price" class="stock-price__price">39.5</span></div></div>',
	currentPrice;

$investorsParents.addClass('stock-price').append(stockTemplate);

var rawData = $.ajax({
	type: 'GET',
	url: 'https://www.quandl.com/api/v1/datasets/LSE/GBO.json?auth_token=mT3skUJNfuGHSjzQxzVd',
})
.done(function(res) {
	var currentPrice = res.data[0][1];
	$('.stock-price__price').html(currentPrice);
})
.fail(function(err) {
	console.log(err);
});