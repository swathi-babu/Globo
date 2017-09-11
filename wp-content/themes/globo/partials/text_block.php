<?php
/**
 * @package globo
 */
?>

<?php require('color-scheme.php'); ?>

<!-- echo the size and column fields as a class on the section, then use that to style accordingly -->
<?php
	$width = str_replace('%', '', get_sub_field('width'));
	$column = get_sub_field('number_of_columns');
	$image = get_sub_field('featured_image');
	$image_position = get_sub_field('featured_image_placement');
 ?>
<section class="<?php echo $color ?> <?php if(get_sub_field('has_featured_image')) { echo 'text-block has-background-image'; } ?> width-<?php echo $width; ?> columns-<?php echo $column; ?>">
	<?php if($image_position == 'background' && get_sub_field('has_featured_image')): ?>
		<img class="text-block__image position-<?php echo $image_position; ?>" src="<?php echo $image['url']  ?>" />
	<?php endif; ?>
	<div class="section-content">
		<?php if($image_position !== 'background' && get_sub_field('has_featured_image')): ?>
		<img class="text-block__image position-<?php echo $image_position; ?>" src="<?php echo $image['url']  ?>" />
		<?php else: ?>
			<div class="text-block__background-screen"></div>
		<?php endif; if(get_sub_field('title')):?>
		<h2 class="text-block__title heavy"><?php the_sub_field('title'); ?></h2>
		<?php endif; ?>
		<div class="text-block__content">
			<?php echo clean_wysiwyg('text',true); ?>
		</div>
	</div>
</section>
<?php wp_reset_postdata(); ?>