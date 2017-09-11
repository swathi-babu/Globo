<?php
/**
 * @package globo
 */
?>

<?php
	if( is_page('Work With Globo') || is_child('Work With Globo') ) {

		$page_query = new WP_Query();
		$all_pages = $page_query->query(array('post_type' => 'page', 'posts_per_page' => '-1'));
		$products =  get_page_by_title('Work With Globo');
		$products_children = get_page_children( $products->ID, $all_pages );
		$children_count = count($products_children);

		if($children_count) {
			echo '<div class="secondary-navigation"><div class="section-content"><ul class="secondary-navigation__content">';

			// Get the main page Menu Items:
			$page_ID = get_page_by_title('Work With Globo')->ID;
			$current_permalink = get_permalink($page_ID);
			echo '<li class="secondary-navigation__item"><a href="' . $current_permalink . '" class="secondary-navigation__link">About Us<span class="secondary-navigation__link__arrow">&dtrif;</span></a>';

			if( get_field('flexible_builder', $page_ID) ) {
				echo '<ul class="secondary-navigation__submenu">';

				while ( has_sub_field('flexible_builder', $page_ID) ) {
					if( get_sub_field('add_to_submenu') && get_sub_field('submenu_link_title') && get_sub_field('submenu_link_anchor') ) {

					echo '<li class="secondary-navigation__submenu__item"><a href="' . $current_permalink . '#' . get_sub_field('submenu_link_anchor') . '" class="secondary-navigation__submenu__link">' . get_sub_field('submenu_link_title') . '</a></li>';
					}
				}
				echo '</ul>';
			}
			echo '</li>';

			for( $i=0; $i<$children_count; $i++ ) {
				$current_ID = $products_children[$i]->ID;
				$current_permalink = get_permalink($current_ID);
				$has_sub_navigation = get_field('flexible_builder', $current_ID);

				echo '<li class="secondary-navigation__item"><a href="' . $current_permalink . '" class="secondary-navigation__link">' . $products_children[$i]->post_title . '<span class="secondary-navigation__link__arrow">&dtrif;</span></a>';

				if( $has_sub_navigation ) {
				echo '<ul class="secondary-navigation__submenu">';

				while( has_sub_field('flexible_builder', $current_ID) ) {
					if( get_sub_field('add_to_submenu') && get_sub_field('submenu_link_title') && get_sub_field('submenu_link_anchor') ) {

						echo '<li class="secondary-navigation__submenu__item"><a href="' . $current_permalink . '#' . get_sub_field('submenu_link_anchor') . '" class="secondary-navigation__submenu__link">' . get_sub_field('submenu_link_title') . '</a></li>';
					}
				}

				echo '</ul>';
			}

				echo '</li>';
			}

			echo '</ul></div></div>';
		}
	} 

	elseif( is_page('Products') || is_child('Products') || is_child('Products/Other') ) {
		$page_query = new WP_Query();
		$all_pages = $page_query->query(array('post_type' => 'page'));
		$products =  is_child('Products/Other') ? get_page_by_title('Other') : get_page_by_title('Products');
		$products_children = get_page_children( $products->ID, $all_pages );
		$children_count = count($products_children);

		if($children_count) {
			echo '<div class="secondary-navigation"><div class="section-content"><ul class="secondary-navigation__content">';

			for( $i=0; $i<$children_count; $i++ ) {
				$current_ID = $products_children[$i]->ID;
				$current_permalink = get_permalink($current_ID);
				$current_title = $products_children[$i]->post_title;
				$has_sub_navigation = get_field('flexible_builder', $current_ID);

				if( !is_child('Products/Other') ) {
					if( is_child('Products/Other', $current_ID) || $current_title == 'Other' ) {
						return;
					}
				}

				echo '<li class="secondary-navigation__item"><a href="' . $current_permalink . '" class="secondary-navigation__link">' . $products_children[$i]->post_title . '<span class="secondary-navigation__link__arrow">&dtrif;</span></a>';

				if( $has_sub_navigation ) {
					echo '<ul class="secondary-navigation__submenu">';

					while( has_sub_field('flexible_builder', $current_ID) ) {
						if( get_sub_field('add_to_submenu') && get_sub_field('submenu_link_title') && get_sub_field('submenu_link_anchor') ) {

							echo '<li class="secondary-navigation__submenu__item"><a href="' . $current_permalink . '#' . get_sub_field('submenu_link_anchor') . '" class="secondary-navigation__submenu__link">' . get_sub_field('submenu_link_title') . '</a></li>';
						}
					}
					echo '</ul>';
				}
				echo '</li>';
			}
			echo '</ul></div></div>';
		}
	}
?>