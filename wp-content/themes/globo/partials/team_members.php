<?php
/**
 * @package globo
 */
?>

<?php require('color-scheme.php'); ?>

<?php
	if( $is_work_page ) {
		array_push($work_sub_menu, array('name' => 'Team', 'id' => 'team-section'));
	}
?>

<section class="team" id="<?php echo get_sub_field('submenu_link_anchor'); ?>">
	<div class="section-content">
		<h2 class="team__title heavy primary">The Team</h2>
		<h3 class="team__subtitle primary">The Board of Directors</h3>
		<?php
			$args = array(
				'post_type' 		=> 'team',
				'posts_per_page'	=> 100,
				'meta_query'		=> array(
					array(
						'key'		=> 'on_board_of_directors',
						'value'		=> 1,
						'compare'	=> '==',
					),
				),
			);

			$teamMembers = new WP_Query($args);
			if ( $teamMembers->have_posts() ) :

			while ($teamMembers->have_posts()) :
				$teamMembers->the_post();
		?>
			<div class="team-member">
				<?php
					$photo =  get_field('image');
				?>
				<img src="<?php echo $photo['url']; ?>" class="team-member__photo" alt="<?php echo $photo['alt']; ?>">
				<p class="team-member__meta"><?php echo get_field('name'); ?><small class="team-member__title"><?php echo get_field('title'); ?></small></p>
			</div>
		<?php
				endwhile;
			endif;
		?>
		<h3 class="team__subtitle primary team__subtitle-executives">Group Executive Team</h3>
		<?php
			$args = array(
				'post_type' 		=> 'team',
				'posts_per_page'	=> 100,
				'meta_query'		=> array(
					array(
						'key'		=> 'on_board_of_directors',
						'value'		=> 0,
						'compare'	=> '==',
					),
				),
			);

			$teamMembers = new WP_Query($args);
			if ( $teamMembers->have_posts() ) :

			while ($teamMembers->have_posts()) :
				$teamMembers->the_post();
		?>
			<div class="team-member">
				<?php
					$photo =  get_field('image');
				?>
				<img src="<?php echo $photo['url']; ?>" class="team-member__photo" alt="<?php echo $photo['alt']; ?>">
				<p class="team-member__meta"><?php echo get_field('name'); ?><small class="team-member__title"><?php echo get_field('title'); ?></small></p>
			</div>
		<?php
				endwhile;
			endif;
		?>
		<?php wp_reset_postdata(); ?>
	</div><!-- .section-content -->
</section>


<?php
	$location = strtolower(get_query_var( 'Location' ));
	$department = get_query_var( 'Department' );
?>
<section class="career" id="career-section">
	<div class="section-content">
		<h2 class="career__title heavy primary">Careers</h2>
		<?php echo get_field('content'); ?>
		<div class="career ">
			<ul class="Career__list">
			<?php
				$args = array(
					'post_type' => 'careers',
					'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'careers_departments',
							'field'    => 'slug',
							'terms'    => $department,
						),
						array(
							'taxonomy' => 'careers_locations',
							'field'    => 'slug',
							'terms'    => $location,
						),
					),
				);

				$careers = new WP_Query($args);
				if ( $careers->have_posts() ) :
					while ($careers->have_posts()) :
						$careers->the_post();
			?>
					<li class="award__post">
						<a href="<?php echo get_field('link'); ?>" target="_blank">
							<?php  get_field('content'); ?>
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
