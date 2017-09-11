<?php
/**
 * @package globo
 */
?>

<section class="awards-slider slider slider--three">
	<?php include(get_template_directory() . '/partials/slider-controls/arrows.php'); ?>
	<div class="section-content">
		<div class="slider-wrap">
			<?php
				$args = array(
					'post_type' 		=> 'awards',
					'posts_per_page'	=> 100,
					'meta_query'		=> array(
						array(
							'key'		=> 'is_featured',
							'value'		=> 1,
							'compare'	=> '==',
						),
					),
				);

				$awards_slider = new WP_Query($args);
				if ( $awards_slider->have_posts() ) :
					while ($awards_slider->have_posts()) :
						$awards_slider->the_post();
						$image = get_field('image');
			?>
			<div class="slide">
				<div class="slide__content">
					<img class="awards-slider__image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
					<h4 class="awards-slider__title"><?php the_title(); ?></h4>
					<p class="awards-slider__text"><?php echo get_field('summary'); ?></p>
				</div>
			</div>
			<?php
					endwhile;
				endif;

				wp_reset_postdata();
			?>
		</div>
	</div>
</section>