<?php
/**
 * @package globo
 */
?>

<?php require('color-scheme.php'); ?>

<section class="news-feed <?php echo $color; ?>">
	<div class="section-content">
		<header class="title-with-button">
			<h2 class="heavy no-wrap">News</h2>
			<a href="#" class="ghost-button">Read All</a>
		</header>
		<div class="feed feed-press-releases">
			<h5 class="feed__title">Press Releases</h5>
			<ul class="feed__list">
			<?php
				$args = array(
					'post_type' => 'news',
					'posts_per_page' => 4,
					'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'news_category',
							'field'    => 'slug',
							'terms'    => 'Press Releases',
						),
					),
				);

				$press_releases = new WP_Query($args);
				if ( $press_releases->have_posts() ) :
					while ($press_releases->have_posts()) :
						$press_releases->the_post();
			?>
					<li class="feed__post press-releases__post">
						<a href="<?php echo get_field('link'); ?>" target="_blank">
							<?php echo get_the_title(); ?>
							<small class="feed-post__meta"><?php echo get_the_date('F, d, Y'); ?></small>
						</a>
					</li>
			<?php
					endwhile;
				endif;
			?>
			</ul>
		</div>
		<div class="feed feed-regulatory-news">
			<h5 class="feed__title">Regulatory News</h5>
			<ul class="feed__list">
			<?php
				$args = array(
					'post_type' => 'news',
					'posts_per_page' => 4,
					'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'news_category',
							'field'    => 'slug',
							'terms'    => 'Regulatory News',
						),
					),
				);

				$regulatory_news = new WP_Query($args);
				if ( $regulatory_news->have_posts() ) :
					while ($regulatory_news->have_posts()) :
						$regulatory_news->the_post();
			?>
					<li class="feed__post regulatory-news__post">
						<a href="<?php echo get_field('link'); ?>" target="_blank">
							<?php echo get_the_title(); ?>
							<small class="feed-post__meta"><?php echo get_the_date('F, d, Y'); ?></small>
						</a>
					</li>
			<?php
					endwhile;
				endif;
			?>
			</ul>
		</div>
		<div class="feed feed-events">
			<h5 class="feed__title">Events</h5>
			<ul class="feed__list">
			<?php
				$args = array(
					'post_type' => 'events',
					'posts_per_page' => 4,
				);

				$events = new WP_Query($args);
				if ( $events->have_posts() ) :
					while ($events->have_posts()) :
						$events->the_post();
			?>
					<li class="feed__post events__post">
						<a href="<?php echo get_the_permalink(); ?>" target="_blank">
							<?php echo get_the_title(); ?>
							<small class="feed-post__meta"><?php echo get_the_date('F, d, Y'); ?></small>
						</a>
					</li>
			<?php
					endwhile;
				endif;

				wp_reset_postdata();
			?>
			</ul>
		</div>
		<div class="feed feed-twitter">
			<h5 class="feed__title">Tweets</h5>
			<ul class="feed__list" id="twitter-feed"></ul>
		</div>
	</div>
</section>