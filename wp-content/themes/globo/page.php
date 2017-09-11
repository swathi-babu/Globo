<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package globo
 */
get_header(); ?>

<?php
	if( is_page('Work With Globo') || is_child('Work With Globo') ) :
		$is_work_page = true;
		require(get_template_directory() . '/partials/navigation/submenu-populate.php');
?>
	<header class="work-page-header">
		<?php 
			$image = get_field('header_background_image');
			$text_color = evaluate_img_color($image['url']);
		?>
		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="background-image work-page-header__image">
		<div class="section-content">
			<h2 class="work-page-header__text <?php echo $text_color; ?>"><?php echo get_field('header_text'); ?></h2>
			<?php if( get_field('has_button') ) {
				echo '<a href="' . get_field('button_url') . '" class="ghost-button work-page-header__button light">' . get_field('button_text') . '</a>';
			} ?>
		</div>
	</header>
<?php
	else:
		$is_work_page = false;
	endif;
?>

<?php

	if( get_field('flexible_builder') ) {
		$row_count = 0;
		$field_name = 'flexible_builder';

		while( has_sub_field('flexible_builder') ) {
			if( get_row_layout() == 'icon_text_list') {
				include(get_template_directory() . '/partials/icon_with_text_list.php');
			}

			elseif( get_row_layout() == 'icon_list') {
				include(get_template_directory() . '/partials/icon_list.php');
			}

			elseif( get_row_layout() == 'call_to_action') {
				include(get_template_directory() . '/partials/call_to_action.php');
			}

			elseif( get_row_layout() == 'grid') {
				include(get_template_directory() . '/partials/grid-block.php');
			}

			elseif( get_row_layout() == 'text_block') {
				include(get_template_directory() . '/partials/text_block.php');
			}

			elseif( get_row_layout() == 'news_feed') {
				include(get_template_directory() . '/partials/news-feed.php');
			}

			elseif( get_row_layout() == 'clients') {
				include(get_template_directory() . '/partials/clients.php');
			}

			elseif( get_row_layout() == 'contact_block') {
				include(get_template_directory() . '/partials/contact_block.php');
			}

			elseif( get_row_layout() == 'slider') {
				include(get_template_directory() . '/partials/slider.php');
			}

			elseif( get_row_layout() == 'custom_wysiwyg') {
				include(get_template_directory() . '/partials/custom_wysiwyg.php');
			}

			elseif( get_row_layout() == 'team_members') {
				include(get_template_directory() . '/partials/team_members.php');
			}

			elseif( get_row_layout() == 'awards') {
				include(get_template_directory() . '/partials/awards.php');
			}

			elseif( get_row_layout() == 'awards_slider') {
				include(get_template_directory() . '/partials/awards_slider.php');
			}

			elseif( get_row_layout() == 'map_block') {
				include(get_template_directory() . '/partials/map_block.php');
			}

			elseif( get_row_layout() == 'partners_slider') {
				include(get_template_directory() . '/partials/partners_slider.php');
			}

			$row_count++;
		}
	}
?>
<?php
	// if( $is_work_page ) {
	// 	$work_sub_menu_count = sizeof($work_sub_menu);
	// 	if( $work_sub_menu_count > 0) {
	// 		echo '<div class="secondary-navigation"><div class="section-content"><ul class="secondary-navigation__content">';

	// 		for($i = 0; $i < $work_sub_menu_count; $i++) {
	// 			echo '<li class="secondary-navigation__item"><a href="#' . $work_sub_menu[$i]['id'] . '" class="secondary-navigation__link">' . $work_sub_menu[$i]['name'] . '</a></li>';
	// 		}

	// 		echo '</ul></div></div>';
	// 	}
	// }
	get_template_part('partials/subnavigation');
?>

<?php get_footer(); ?>
