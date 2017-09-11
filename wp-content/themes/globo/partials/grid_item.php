<?php
/**
 * @package globo
 */
?>

<?php require_once('color-scheme.php'); ?>

<section class="<?php echo $color ?>">
	<div class="section-content">
		<?php if( have_rows('grid_item') ): ?>
			<ul class="icon-list">
				<?php
					while( have_rows('grid_item') ):
						the_row();
				?>
				<li>
					<p class="grid_item"><?php the_sub_field('grid_size'); ?></p>
					<p class="grid_item"><?php the_sub_field('title'); ?></p>
					<p class="grid_item"><?php the_sub_field('text'); ?></p>
					<p class="grid_item"><?php the_sub_field('background_image'); ?></p>
				
				<?php if( get_sub_field('has_button') ): ?>
					<a href="<?php the_sub_field('button_url'); ?>" class="ghost-button <?php echo $text_color; ?>"><?php the_sub_field('button_text'); ?></a>
				<?php endif; ?>
				</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>

