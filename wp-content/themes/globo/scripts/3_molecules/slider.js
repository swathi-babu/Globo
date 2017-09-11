function globoSlider(element, options) {
	var $this			= $(this),
		$element		= $(element),
		$wrapper		= $element.find('.slider-wrap'),
		$slides			= $element.find('.slide'),
		$leftArrow		= $element.find('.slider-arrow-left'),
		$rightArrow		= $element.find('.slider-arrow-right'),
		flexbox			= $html.hasClass('flexbox') ? true : false,
		sliderThree		= $element.hasClass('slider--three') ? true : false,
		numSlides		= $slides.length,
		slideSize		= (100/numSlides),
		currentSlide	= 0,
  		options			= options || {},
  		sliderSize;

  	if(sliderThree && ww >= 1200) {
  		if(numSlides % 3 !== 0) {
  			var remainder = numSlides % 3;
  			var difference = 3 - remainder;
  			slideSize = 100/(numSlides + difference);
  		}
  	}

  	// Helper Functions
	var noop 			= function() {},
		offloadFn 		= function(fn) { setTimeout(fn || noop, 0) };

	// Handle Options:
	var gAuto	= options.automatic || false,
		gWidth	= $wrapper.hasClass('slider-three') ? 3 : 0;
	// set container width based on how many slides should be showing

	// If the target element doesn't exist, stop:
	if($element.size() <= -1) {
		return;
	}

	// Main function for transforming slides:
	function setContainerOffset(amt, animate) {
		$wrapper.removeClass('animate');

		if(animate) {
			$wrapper.addClass('animate');
		}

		$wrapper.css({
			'transform':'translateX(' + amt + '%)',
			'-webkit-transform':'translateX(' + amt + '%)',
			'-moz-transform':'translateX(' + amt + '%)',
			'-ms-transform':'translateX(' + amt + '%)',
			'-o-transform':'translateX(' + amt + '%)',
		});
	}

	function setSlideVisibility(idx) {
		var vMin = idx;
		var vMax = Math.min((idx + 2), (numSlides - 1));

		$slides.addClass('slide--hidden');
		for($i = vMin; $i <= vMax; $i++) {
			$slides.eq($i).removeClass('slide--hidden');
		}
	}

	$this.slideTo = function(index) {
		console.log('index: ', index);
		if(isDesktop()) {
			index = sliderThree ? Math.max(0, Math.min(index, (numSlides - 3))) : Math.max(0, Math.min(index, (numSlides - 1)));
		} else {
			index = Math.max(0, Math.min(index, (numSlides - 1)));
		}
		currentSlide = index;

		var offset = index * slideSize * -1;
		setContainerOffset(offset, true);
		setSlideVisibility(index);

    	offloadFn(options.callback && options.callback(index));
	};

	$this.prev = function() {
		return $this.slideTo(currentSlide - 1);
	};

	$this.next = function() {
		return $this.slideTo(currentSlide + 1);
	};

	$this.wrapperLayout = function() {
		console.log('wrapperLayout called');
		// Set wrapper size
		if(ww >= 1200 && sliderThree) {
			sliderSize = Math.ceil((numSlides/3)) * 100;
		} else {
			sliderSize = numSlides * 100;
		}

		$wrapper.css('width', sliderSize + '%');
	};

	$this.slideLayout = function() {
		console.log('slideLayout called');
		// If no flexbox, set slide widths manually
		if(!flexbox) {
			$slides.css('width', slideSize + '%');
		}
	};

	$this.rebuild = function() {
		numSlides		= $slides.length,
		slideSize		= (100/numSlides),
		currentSlide	= 0,
  		options			= options || {},
  		sliderSize;

  		$this.wrapperLayout();
  		$this.slideLayout();
  		console.log('rebuilt');
	}

	$this.init = function() {
		$this.wrapperLayout();
		$this.slideLayout();
		setSlideVisibility(0);

		// Initiate gesture detection:
		new Hammer($element[0], {}).on("panend panleft panright swipeleft swiperight", handleHammer);

		// Add arrow event listeners
		$leftArrow.on('click', function(e) {
			e.preventDefault();
			$this.prev();
		});

		$rightArrow.on('click', function(e) {
			e.preventDefault();
			$this.next();
		});
	};

	return {
		init: function() {
			$this.init();
		},
		rebuild: function() {
			$this.rebuild();
		},
	};

	function handleHammer(ev) {

		if($html.hasClass('touch')) {
			switch(ev.type) {
				case 'panright':
				case 'panleft':
					// stick to the finger:
					var slideOffset = -((slideSize)*currentSlide);
					var dragOffset = (ev.deltaX/((ww*(numSlides+1)))*100);

					// slow down at the first and last pane
					if((currentSlide === 0 && ev.direction == 4) || (currentSlide == numSlides && ev.direction == 2)) {
							dragOffset *= 0.4;
					}

					setContainerOffset(slideOffset + dragOffset);
				break;

				case 'swipeleft':
					$this.next();
					ev.stop;
				break;

				case 'swiperight':
					$this.prev();
					ev.stop;
				break;

				case 'panend':
					// more then 50% moved, navigate
					if(Math.abs(ev.deltaX) > ww/4) {
						if(ev.direction == 4) {
							$this.prev();
						} else {
							$this.next();
						}
					} else {
						$this.slideTo(currentSlide);
					}
				break;
			}
		}
	}
}

// Initialize all sliders on the page
var $sliders = $('.slider');

$sliders.each(function(idx, ctx) {
	// var sName = 'slider__initted_' + idx;
	// $(this).addClass(sName);

	sName = globoSlider($(ctx), {});
	sName.init();
});