<?php
/**
 * @package globo
 */
?>

<?php
	if( $is_work_page ) {
		array_push($work_sub_menu, array('name' => 'Global Presence', 'id' => 'map-section'));
	}
?>

<section class="map-block" id="<?php echo get_sub_field('submenu_link_anchor'); ?>">
	<div class="map-block__map">
		<div class="section-content">
			<h2 class="heavy primary">Global Presence</h2>
		</div>
	</div>
	<div class="map-block__locations">
		<div class="map-block__map-bottom"></div>
		<div class="section-content">
		<?php
			// Get total number of locations
			$location_args = array(
				'orderby'           => 'count',
				'order'             => 'DESC',
				'hide_empty'        => false,
				'fields'            => 'names',
			);
			$locations = get_terms('location_country', $location_args);

			// Loop through for each location name and output the returned locations
			foreach($locations as $location_name) {
				$args = array(
					'post_type' => 'locations',
					'posts_per_page' => 10,
					'order' => 'ASC',
					'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'location_country',
							'field'    => 'slug',
							'terms'    => $location_name,
						),
					),
				);

				$location = new WP_Query($args);
				if ( $location->have_posts() ) :
					echo '<div class="location-block__group"><h3 class="primary location__location-title">' . $location_name . '</h3>';
					while ($location->have_posts()) :
						$location->the_post();
							echo '<p class="map-location"><strong class="map-location__title">' . get_the_title() . '</strong>';


						if( have_rows('address') ) {
							while( have_rows('address') ) {
								the_row();
								echo '<span class="map-location__line">' . get_sub_field('address_line') . '</span>';
							}
						}

						$phone = get_field('phone');
						echo '<span class="map-location__line"><a href="tel:' . $phone . '">Phone ' . $phone . '</a></span>';

						$fax = get_field('fax');
						if($fax) {
							echo '<span class="map-location__line">Fax ' . $fax . '</span>';
						}

						echo '</p>';
					endwhile;
					echo '</div>';
				endif;
				wp_reset_postdata();
			}
		?>
		</div>
	</div>
</section>