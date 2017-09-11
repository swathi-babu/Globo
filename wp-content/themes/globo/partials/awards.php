<?php
/**
 * @package globo
 */
?>

<?php
	if( $is_work_page ) {
		array_push($work_sub_menu, array('name' => 'Awards', 'id' => 'awards-section'));
	}
?>

<section class="awards" id="<?php echo get_sub_field('submenu_link_anchor'); ?>">
	<div class="section-content">
		<h2 class="awards__title heavy primary">AWARDS</h2>
		<div class="award ">
			<p class="award__text">Globo has been established as one of the leading companies in the Enterprise Mobility and ICT industries.</p>
			<p class="award__text">The firm's technology and products innovation along with its contribution in the transformation of Enterprise Mobility with products like Enterprise Mobility in a Box(TM) have been recognized by well known industry organizations with awards and significant short listings on a global stage.</p>
			<ul class="award__list">
			<?php
				$args = array(
					'post_type' => 'awards',
					'posts_per_page' => 20,
				);

				$awards = new WP_Query($args);
				if ( $awards->have_posts() ) :
					while ($awards->have_posts()) :
						$awards->the_post();
			?>
					<li class="award__post">
						<a href="<?php echo get_field('link'); ?>" target="_blank">
							<?php echo get_the_title(); ?>
							<small class="award-post__meta"><?php echo get_the_date('F, d, Y'); ?></small>
						</a>
					</li>
			<?php
					endwhile;
				endif;
			?>
			</ul>
		</div>
		<?php wp_reset_postdata(); ?>
	</div><!-- .section-content -->
</section>