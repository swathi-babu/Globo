<?php
/**
 * @package globo
 */
?>
<!-- <?php require_once('color-scheme.php'); ?>
<section class="product-block-section">
	<?php
		$bg_image = get_sub_field('background_image');
	?>
	<img class="background-image" src='<?php echo $bg_image["url"]; ?>' alt='<?php echo $bg_image["alt"]; ?>'/>

	<div class="section-content">
		<h2 class="text-block__title heavy"><?php the_sub_field('title'); ?></h2>
		<?php the_sub_field('subtitle'); ?>
		<a href="<?php the_sub_field('button_url'); ?>" class="ghost-button">
		<?php the_sub_field('button_text'); ?></a>
	</div>
</section> -->






<?php
	
	if($grid_width_total == 4 && $grid_height_total == 2):
?>

<section class="product-block-section acf-edit">
	<?php
		$bg_image = get_sub_field('background_image');
	?>
	<img class="background-image" src='<?php echo $bg_image["url"]; ?>' alt='<?php echo $bg_image["alt"]; ?>'/>
		<div class="section-content">
			<h2 class="primary heavy acf-edit__field product-block-section__title" data-acf-key="<?php echo $field_name . '_' . $row_count . '_' . 'title'; ?>"><?php the_sub_field('title'); ?></h2>
	<?php 

		while( have_rows('grid_item') ):
			the_row();
			require('color-scheme.php');
	?>
			<div class="product-block__column">
				<div class="product-block__item grid-size__4x2<?php echo ' ' . $color; ?> has-background-image">
					<a class="grid-block__link" href="<?php echo get_sub_field('grid_link'); ?>" data-acf-key="<?php echo $field_name . '_' . $row_count . '_grid_item_' . $grid_row_count . '_grid_link'; ?>">
		
		<?php
					if(get_sub_field('text')):
		?>
						<h4 class="product-item__title acf-edit__field" data-acf-key="<?php echo $field_name . '_' . $row_count . '_grid_item_' . $grid_row_count . '_title'; ?>"><?php the_sub_field('title'); ?></h4>
						<h4 class="product-item__subtitle acf-edit__field" data-acf-key="<?php echo $field_name . '_' . $row_count . '_grid_item_' . $grid_row_count . '_subtitle'; ?>"><?php the_sub_field('subtitle'); ?></h4>
						<p class="product-item__text acf-edit__field" data-acf-key="<?php echo $field_name . '_' . $row_count . '_grid_item_' . $grid_row_count . '_text'; ?>"><?php the_sub_field('text'); ?></p>
						<a href="<?php the_sub_field('button_url'); ?>" class="ghost-button">
							<?php the_sub_field('button_text'); ?></a>

		<?php
					else:
		?>
						<h4 class="product-item__title acf-edit__field" data-acf-key="<?php echo $field_name . '_' . $row_count . '_grid_item_' . $grid_row_count . '_title'; ?>"><?php the_sub_field('title'); ?></h4>
		<?php
					endif;
		?>			
						</div><!-- .grid-item__content -->
					</a><!-- .grid-block__link -->
				</div><!-- .grid-block__item -->
			</div><!-- .div-block__column -->
		<?php endwhile; ?>
		</div><!-- .section-content -->
	</section>
<?php endif; ?>
