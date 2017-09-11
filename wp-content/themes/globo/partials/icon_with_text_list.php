<?php
/**
 * @package globo
 */
?>

<?php require('color-scheme.php'); ?>
<section class="<?php echo $color ?> icon-list-block icon-text-block acf-edit" <?php if( get_sub_field('add_to_submenu') && get_sub_field('submenu_link_title') && get_sub_field('submenu_link_anchor') ) { echo 'id="' . get_sub_field('submenu_link_anchor') . '"'; } ?>>
	<div class="section-content">
		<header class="title-with-button">
			<h2 class="heavy acf-edit__field" data-acf-key="<?php echo $field_name . '_' . $row_count . '_' . 'title'; ?>"><?php the_sub_field('title'); ?></h2>
			<a href="<?php the_sub_field('button_url'); ?>" class="ghost-button acf-edit__field" data-acf-key="<?php echo $field_name . '_' . $row_count . '_' . 'button_text'; ?>"><?php echo get_sub_field('button_text'); ?></a>
		</header>
		<?php
			$count = count(get_sub_field('icon_list_item'));
			$class = '_' . $count . '-items ';
			if($count % 3 == 0 & $count % 4 !== 0) {
				$class .= 'factor-of-three';
			}
			if( have_rows('icon_list_item') ):
				$icon_list_item_count = 0;
		?>
			<ul class="icon-list <?php echo $class; ?>">
				<?php
					while( have_rows('icon_list_item') ):
						the_row();
				?>
				<li class="icon-list__item">
					<?php
						$icon = get_sub_field('icon');
						$icon_width = $icon['width'];
						$icon_height = $icon['height'];
						$icon_class = $icon_width > $icon_height ? '' : 'tall';
						$svg = strpos($icon['mime_type'], 'svg') !== false ? 'type-svg' : '';
						print_r($svg);
						if( !empty($icon) ): ?>
							<div class="icon-list__icon-container">
								<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" class="icon-list__icon <?php echo $icon_class . ' ' . $svg; ?>" />
							</div>
					<?php endif; ?>
					<h4 id="title" class="icon-list__title acf-edit__field" data-acf-key="<?php echo $field_name . '_' . $row_count . '_' . 'icon_list_item_' . $icon_list_item_count . '_' . 'title'; ?>"><?php the_sub_field('title'); ?></h4>
					<p id="text"class="icon-list__text acf-edit__field" data-acf-key="<?php echo $field_name . '_' . $row_count . '_' . 'icon_list_item_' . $icon_list_item_count . '_' . 'text'; ?>"><?php the_sub_field('text'); ?></p>

				</li>
				<?php $icon_list_item_count++; ?>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	</div>
</section>