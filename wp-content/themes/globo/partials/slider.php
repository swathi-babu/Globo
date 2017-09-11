<?php
/**
 * Slider Layout
 *
 * @package globo
 */
?><section class="slider <?php if(get_sub_field('num_slides_visible') == 'three') { echo 'slider--three'; }; if(get_sub_field('slider_class')) { echo ' ' . get_sub_field('slider_class'); }; ?>">
	<?php if( have_rows('slide') ): ?>
	<?php get_template_part('partials/slider-controls/arrows'); ?>
	<div class="section-content">
		<div class="slider-wrap">
		<?php while( have_rows('slide') ): the_row(); ?>
			<div class="slide">
				<?php echo clean_wysiwyg('content', true); ?>
			</div>
		<?php endwhile; ?>
		</div>
	</div>
</section>
<?php endif; ?>