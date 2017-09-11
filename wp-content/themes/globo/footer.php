<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of <main> and all content after
 *
 * @package globo
 */
?>

	</main>
	<footer class="secondary">
		<?php get_template_part('partials/navigation/menu'); ?>
		<div class="section-content">
			<?php get_template_part('partials/forms/newsletter'); ?>
			<?php get_template_part('partials/social-links'); ?>
			<?php get_template_part('partials/copyright'); ?>
		</div>
	</footer>

<?php wp_footer(); ?>

<?php include_once('partials/grid.php'); ?>

</body>
</html>
