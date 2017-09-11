<?php
/**
 * @package globo
 */
?>

<?php require('color-scheme.php'); ?>

<section class="clients <?php echo $color; ?> slider">
	<?php get_template_part('partials/slider-controls/arrows'); ?>
	<div class="section-content">
		<h2 class="heavy client-list__title">See Who's Working With Us</h2>
		<div class="slider-wrap">
			<div class="slide">
				<ul class="client-list">
					<li class="client-list__item">
						<i class="client-list__icon fill-white client-adobe-icon">
							<svg>
								<use xlink:href='#client-adobe-icon'></use>
							</svg>
						</i>
					</li>
					<li class="client-list__item">
						<i class="client-list__icon fill-white client-boa-icon">
							<svg>
								<use xlink:href='#client-boa-icon'></use>
							</svg>
						</i>
					</li>
					<li class="client-list__item">
						<i class="client-list__icon fill-white client-cisco-icon">
							<svg>
								<use xlink:href='#client-cisco-icon'></use>
							</svg>
						</i>
					</li>
					<li class="client-list__item">
						<i class="client-list__icon fill-white client-coke-icon">
							<svg>
								<use xlink:href='#client-coke-icon'></use>
							</svg>
						</i>
					</li>
					<li class="client-list__item">
						<i class="client-list__icon fill-white client-ge-icon">
							<svg>
								<use xlink:href='#client-ge-icon'></use>
							</svg>
						</i>
					</li>
					<li class="client-list__item">
						<i class="client-list__icon fill-white client-ibm-icon">
							<svg>
								<use xlink:href='#client-ibm-icon'></use>
							</svg>
						</i>
					</li>
					<li class="client-list__item">
						<i class="client-list__icon fill-white client-intel-icon">
							<svg>
								<use xlink:href='#client-intel-icon'></use>
							</svg>
						</i>
					</li>
					<li class="client-list__item">
						<i class="client-list__icon fill-white client-pg-icon">
							<svg>
								<use xlink:href='#client-p&g-icon'></use>
							</svg>
						</i>
					</li>
					<li class="client-list__item">
						<i class="client-list__icon fill-white client-samsung-icon">
							<svg>
								<use xlink:href='#client-samsung-icon'></use>
							</svg>
						</i>
					</li>
					<li class="client-list__item">
						<i class="client-list__icon fill-white client-symantec-icon">
							<svg>
								<use xlink:href='#client-symantec-icon'></use>
							</svg>
						</i>
					</li>
				</ul>
			</div><!-- .slide -->
		</div><!-- .slider-wrap -->
	</div>
</section>