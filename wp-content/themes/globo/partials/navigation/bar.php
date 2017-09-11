<?php
/**
 * The menu bar that appears at the
 * top of the page
 *
 * @package globo
 */
?>
<?php
	$image = get_field('header_background_image');
	if( $image ) {
		$text_color = evaluate_img_color($image['url']);
	}
?>
<nav class="primary-navigation <?php echo $text_color; ?>-logo">
	<div class="section-content">

		<div class="bar-items">
			<ul class="page-info">
				<li class="page-info__item logo">
					<a href="/" class="logo-link">
						<i class="logo-icon fill-<?php echo $text_color; ?>">
							<svg>
								<use xlink:href='#logo-icon'></use>
							</svg>
						</i>
					</a>
				</li>
				<li class="page-info__item menu-title">Menu</li>
				<li class="page-info__item page-title">
				<?php
					if(!is_page('home')) {
						echo get_the_title();
					}
				?>
				</li>
			</ul><!-- .page-info -->
			<ul class="primary-navigation__items">
				<li class="primary-navigation__item primary-navigation__item--btt mobile-hidden">
					<a href="" class="primary-navigation__link" id="btt">
						<i class="primary-navigation__icon btt-icon fill-white">
							<svg>
								<use xlink:href='#btt-icon'></use>
							</svg>
						</i>
					</a>
				</li>
				<li class="primary-navigation__item primary-navigation__item--search">
					<a href="" class="primary-navigation__link search__link">
						<i class="primary-navigation__icon search-icon fill-white">
							<svg>
								<use xlink:href='#search-icon'></use>
							</svg>
						</i>
					</a>
					<?php get_template_part('partials/forms/search'); ?>
				</li>
				<li class="primary-navigation__item primary-navigation__item--trial mobile-hidden">
					<a href="" class="primary-navigation__link">Free Trial</a>
				</li>
				<li class="primary-navigation__item primary-navigation__item--contact">
					<a href="" class="primary-navigation__link">
						<span class="primary-navigation__text">Contact</span>
						<i class="primary-navigation__icon contact-icon fill-white">
							<svg>
								<use xlink:href='#contact-icon'></use>
							</svg>
						</i>
					</a>
				</li>
				<li class="primary-navigation__item primary-navigation__item--hamburger">
					<a href="" class="primary-navigation__link">
						<i class="primary-navigation__icon hamburger-icon fill-white">
							<svg>
								<use xlink:href='#hamburger-icon'></use>
							</svg>
						</i>
						<i class="primary-navigation__icon close-icon fill-white">
							<svg>
								<use xlink:href='#close-icon'></use>
							</svg>
						</i>
					</a>
				</li>
			</ul><!-- .primary-navigation__items -->
		</div><!-- .bar-items -->
		<div class="menu-items">
			<ul class="page-info">
				<li class="page-info__item logo">
					<a href="/" class="logo-link">
						<i class="logo-icon fill-white">
							<svg>
								<use xlink:href='#logo-icon'></use>
							</svg>
						</i>
					</a>
				</li>
				<li class="page-info__item menu-title">Menu</li>
			</ul><!-- .page-info -->
			<ul class="primary-navigation__items">
				<li class="primary-navigation__item primary-navigation__item--btt mobile-hidden">
					<a href="" class="primary-navigation__link" id="btt">
						<i class="primary-navigation__icon btt-icon fill-primary">
							<svg>
								<use xlink:href='#btt-icon'></use>
							</svg>
						</i>
					</a>
				</li>
				<li class="primary-navigation__item primary-navigation__item--search">
					<a href="" class="primary-navigation__link search__link">
						<i class="primary-navigation__icon search-icon fill-white">
							<svg>
								<use xlink:href='#search-icon'></use>
							</svg>
						</i>
					</a>
					<?php get_template_part('partials/forms/search'); ?>
				</li>
				<li class="primary-navigation__item primary-navigation__item--trial mobile-hidden">
					<a href="" class="primary-navigation__link">Free Trial</a>
				</li>
				<li class="primary-navigation__item primary-navigation__item--contact">
					<a href="" class="primary-navigation__link">
						<span class="primary-navigation__text">Contact</span>
						<i class="primary-navigation__icon contact-icon fill-white">
							<svg>
								<use xlink:href='#contact-icon'></use>
							</svg>
						</i>
					</a>
				</li>
				<li class="primary-navigation__item primary-navigation__item--hamburger">
					<a href="" class="primary-navigation__link">
						<i class="primary-navigation__icon close-icon fill-white">
							<svg>
								<use xlink:href='#close-icon'></use>
							</svg>
						</i>
					</a>
				</li>
			</ul><!-- .primary-navigation__items -->
		</div><!-- .menu-items -->
	</div><!-- .section-content -->
</nav>