<?php
/**
 * @package globo
 */
?>


<section class="partners-slider slider slider--three light">
	<?php include(get_template_directory() . '/partials/slider-controls/arrows.php'); ?>
	<div class="section-content">
		<h2 class="delimiter heavy partners-slider__title">Our Partners</h2>
		<?php
			/* Partner Types Taxonomy:
			** ~~~~~~~~~~~~~~~~~~~~~~~
			**
			** Get all of the available
			** Partner types, push them
			** into a select (for mobile)
			** and a <ul> element (desktop)
			**
			** ~~~~~~~~~~~~~~~~~~~~~~~~~
			*/
			$types_args = array(
				'orderby'		=> 'name',
				'order'			=> 'ASC',
				'hide_empty'	=> true,
			);

			$types_terms = get_terms('partner_type', $types_args);

			if(count($types_terms) > 0) {
				echo '<select class="two-taxonomy__control two-taxonomy__select" data-taxonomy="partner_type"><option value="placeholder" selected disabled>Partner Type</option>';
					foreach($types_terms as $term) {
						$term_name = $term->name;
						echo '<option value="' . $term_name . '">' . $term_name . '</option>';
					}
				echo '<select>';

				echo '<ul class="two-taxonomy__control two-taxonomy__list" data-taxonomy="partner_type">';
					foreach($types_terms as $term) {
						$term_name = $term->name;
						echo '<li class="two-taxonomy__control two-taxonomy__list-item">' . $term_name . '</li>';
					}
				echo '</ul>';
			}
			/* Partner Locations Taxonomy:
			** ~~~~~~~~~~~~~~~~~~~~~~~~~~~
			**
			** Get all of the available
			** Partner locations, push them
			** into a select (for mobile)
			** and a <ul> element (desktop)
			**
			** ~~~~~~~~~~~~~~~~~~~~~~~~~~~~
			*/
			$locations_args = array(
				'orderby'		=> 'name',
				'order'			=> 'ASC',
				'hide_empty'	=> true,
			);

			$locations_terms = get_terms('partner_location', $locations_args);

			if(count($locations_terms) > 0) {
				echo '<select class="two-taxonomy__control two-taxonomy__select" data-taxonomy="partner_location">';
					foreach($locations_terms as $l_term) {
						$l_term_name = $l_term->name;

						echo '<option value="' . $l_term_name . '">' . $l_term_name . '</option>';
					}
				echo '<select>';

				echo '<ul class="two-taxonomy__control two-taxonomy__list" data-taxonomy="partner_location">';
					foreach($locations_terms as $l_term) {
						$l_term_name = $l_term->name;
						$selected_class = '';

						if($l_term_name == 'Americas') {
							$selected_class = 'selected';
						}

						echo '<li class="two-taxonomy__control two-taxonomy__list-item ' . $selected_class . '">' . $l_term_name . '</li>';
					}
				echo '</ul>';
			}
		?>
		<a href="#" class="ghost-button two-taxonomy__control two-taxonomy__filter" id="filter-partners">Filter Partners</a>
		<div class="slider-wrap">
		<?php
			$args = array(
				'post_type'	=> 'partners',
				'order'		=> 'ASC',
				'tax_query'	=> array(
					'relation'	=> 'AND',
					array(
						'taxonomy'	=> 'partner_type',
						'field'		=> 'slug',
						'terms'		=> 'Distributors',
					),
					array(
						'taxonomy'	=> 'partner_location',
						'field'		=> 'slug',
						'terms'		=> 'Americas',
					),
				),
			);

			$partners = new WP_Query($args);
			if( $partners->have_posts() ) {
				while( $partners->have_posts() ) {
					$partners->the_post();
					echo  '<div class="slide partner-slider__slide"><div class="slide__content">';
					$partner_logo = get_field('logo');
					$partner_logo_width = $partner_logo['width'];
					$partner_logo_height = $partner_logo['height'];
					$testimonial = get_field('testimonial', false, false);
					$website = get_field('website');
					if( $partner_logo) {
						$logo_size = $partner_logo_width > $partner_logo_height ? 'wide' : 'tall';
						echo '<div class="partner-slider__logo-wrap"><img src="' . $partner_logo['url'] . '" class="parter-slider__logo ' . $logo_size . '" alt="' . $partner_logo['alt'] . '" /></div>';
					}
					if ( $testimonial ) {
						echo '<p class="parter-slider__testimonial">' . $testimonial . '</p>';
					}
					if( $website ) {
						echo '<small class="partner-slider__link"><a href="' . $website . '">' . $website . '</a></small>';
					}
					echo '</div></div>';
				}
			}
		?>
		</div><!-- .slider-wrap -->
	</div><!-- .section-content -->
</section>