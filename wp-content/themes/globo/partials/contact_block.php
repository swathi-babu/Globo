<?php
/**
 * @package globo
 */
?>

<?php require('color-scheme.php'); ?>

<section class="contact-block has-background-image <?php echo $color; ?>">
	<?php $bg_image = get_sub_field('background_image'); ?>
	<img src="<?php echo $bg_image['url']; ?>" alt="<?php echo $bg_image['alt']; ?>" class="background-image">
	<div class="section-content">
		<div class="half">
			<h2 class="contact-block__title"><?php the_sub_field('title'); ?></h2>
			<h5 class="contact-block__subtitle">Globo Offices in USA</h5>
			<div class="locations">
			<?php
				$args = array(
					'post_type' => 'locations',
					'posts_per_page' => 4,
					'order' => 'ASC',
					'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'location_country',
							'field'    => 'slug',
							'terms'    => 'USA',
						),
					),
				);

				$locations = new WP_Query($args);
				if ( $locations->have_posts() ) :
					while ($locations->have_posts()) :
						$locations->the_post();
			?>
				<ul class="location">
					<li class="location__item location__title"><?php the_title(); ?></li>
					<li>
					<?php
						if( have_rows('address') ) {
							while( have_rows('address') ) {
								the_row();
								echo '<span class="location__line">' . get_sub_field('address_line') . '</span>';
							}
						}

						$phone = get_field('phone');
					?>
					</li>
					<li class="location__item location__phone">
						<a href="tel:<?php echo $phone; ?>">Phone <?php echo $phone; ?></a>
					</li>
					<?php
						if(get_field('fax')):
					?>
					<li class="location__item location__fax">Fax <?php the_field('fax'); ?></li>
					<?php endif; ?>
					<li class="location__map">
					<?php
						$location = get_field('location');
						$lat_long	= $location['lat'] . ',' . $location['lng'];
					?>
						<img class="location__map-image" src="http://maps.google.com/maps/api/staticmap?center=<?php echo $lat_long; ?>&zoom=13&markers=<?php echo $lat_long; ?>&size=80x200&sensor=TRUE_OR_FALSE" alt="a map preview of this location">
					</li>
				</ul>
			<?php
					endwhile;
				endif;
			?>
			</div>
		</div>
		<div class="half">
			<form action="" id="contact-form" class="contact-form">
				<div class="field">
					<label for="">Your Name</label>
					<input type="text">
				</div>
				<div class="field">
					<label for="">Company You Work For</label>
					<input type="text">
				</div>
				<div class="field">
					<label for="">Your Email</label>
					<input type="text">
				</div>
				<div class="field">
					<label for="">Whats Up?</label>
					<textarea></textarea>
				</div>
				<div class="field submit-field align-right">
					<input type="submit" value="Send">
				</div>
			</form>
		</div>
	</div>
</section>