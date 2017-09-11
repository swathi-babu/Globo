<?php
/**
 * @package globo
 */
?>

<?php require('color-scheme.php'); ?>

<section class="<?php echo $color ?>">
	<div class="section-content action">
		<h1><?php the_sub_field('title'); ?></h1>
		<p ><?php the_sub_field('text'); ?></p>
		<a href="<?php the_sub_field('button_url'); ?>" class="ghost-button">
		<?php the_sub_field('button_text'); ?></a>
	</div>
</section>