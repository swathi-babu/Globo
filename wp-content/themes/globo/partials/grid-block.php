<?php
/**
 * @package globo
 */
?>
<?php
	// Get the grid items, push sizes to an array:
	$grid_items = get_sub_field('grid_item');
	$count = count($grid_items);
	$grid_sizes = array();
	for($i = 0; $i < $count; $i++) {
		$current_item = explode('x', $grid_items[$i]['grid_size']);
		array_push($grid_sizes, $current_item);
	}

	// Push the grid sizes to the appropriate array
	// for height and width:
	$grid_sizes_count = count($grid_sizes);
	$grid_widths = array();
	$grid_heights = array();

	for($j = 0; $j < $grid_sizes_count; $j++) {
		array_push($grid_widths, $grid_sizes[$j][0]);
		array_push($grid_heights, $grid_sizes[$j][1]);
	}

	// Add up grid widths:
	$widths_count = count($grid_widths);
	$grid_width_total = 0;
	for($k = 0; $k < $widths_count; $k++) {
		$grid_width_total += $grid_widths[$k];
	}

	// Add up grid heights:
	$heights_count = count($grid_heights);
	$grid_height_total = 0;
	$one_by_one_count = 0;

	for($l = 0; $l < $heights_count; $l++) {
		if($grid_sizes[$l][0] == '1' && $grid_sizes[$l][1] == '1') {
			$one_by_one_count++;

			if($one_by_one_count % 2 == 0) {
				$grid_height_total += $grid_heights[$l];
			}
		} else {
			$grid_height_total += $grid_heights[$l];
		}
	}

	if($grid_width_total == 4 && $grid_height_total == 4):
?>
	<section class="grid-block-section acf-edit grid-block--2-wide">
		<div class="section-content">
			<h2 class="primary heavy acf-edit__field grid-block-section__title" data-acf-key="<?php echo $field_name . '_' . $row_count . '_' . 'title'; ?>"><?php the_sub_field('title'); ?></h2>
	<?php 

		while( have_rows('grid_item') ):
			the_row();
			require('color-scheme.php');
	?>
			<div class="grid-block__column">
				<div class="grid-block__item grid-size__2x2<?php echo ' ' . $color; ?> has-background-image">
					<a class="grid-block__link" href="<?php echo get_sub_field('grid_link'); ?>" data-acf-key="<?php echo $field_name . '_' . $row_count . '_grid_item_' . $grid_row_count . '_grid_link'; ?>">
		<?php
					$bg_image = get_sub_field('background_image');
					if(!empty($bg_image)):
		?>
						<img class="grid-block__background-image background-image acf-edit__image" src='<?php echo $bg_image["url"]; ?>' alt='<?php echo $bg_image["alt"]; ?>' data-acf-key="<?php echo $field_name . '_' . $row_count . '_grid_item_' . $grid_row_count . '_background_image'; ?>" /><?php endif; ?>
						<div class="grid-item__content">
		<?php
					if(get_sub_field('text')):
		?>
						<h4 class="grid-item__title acf-edit__field" data-acf-key="<?php echo $field_name . '_' . $row_count . '_grid_item_' . $grid_row_count . '_title'; ?>"><?php the_sub_field('title'); ?></h4>
						<p class="grid-item__text acf-edit__field" data-acf-key="<?php echo $field_name . '_' . $row_count . '_grid_item_' . $grid_row_count . '_text'; ?>"><?php the_sub_field('text'); ?></p>
		<?php
					else:
		?>
						<h4 class="grid-item__title acf-edit__field" data-acf-key="<?php echo $field_name . '_' . $row_count . '_grid_item_' . $grid_row_count . '_title'; ?>"><?php the_sub_field('title'); ?></h4>
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
<?php

	elseif($grid_width_total % 2 == 0 && $grid_height_total % 2 == 0):
?>

<section class="grid-block-section acf-edit">
	<div class="section-content">
		<h2 class="primary heavy acf-edit__field grid-block-section__title" data-acf-key="<?php echo $field_name . '_' . $row_count . '_' . 'title'; ?>"><?php the_sub_field('title'); ?></h2>
		<?php
			if( have_rows('grid_item') ):
				$grid_row_count = 0;
		?>
			<div class="grid-block__column">
		<?php
				$grid_item_count = 0;
				$grid_onebyone_count = 0;
				$grid_height_count = 0;
				$grid_width_count = 0;
				while( have_rows('grid_item') ):
					the_row();
					require('color-scheme.php');
		?>
		<div class="grid-block__item grid-size__<?php echo get_sub_field('grid_size'); echo ' ' . $color; ?> has-background-image">
			<a class="grid-block__link" href="<?php echo get_sub_field('grid_link'); ?>" data-acf-key="<?php echo $field_name . '_' . $row_count . '_grid_item_' . $grid_row_count . '_grid_link'; ?>">
		<?php
					$bg_image = get_sub_field('background_image');
					if(!empty($bg_image)):
		?>
						<img class="grid-block__background-image background-image acf-edit__image" src='<?php echo $bg_image["url"]; ?>' alt='<?php echo $bg_image["alt"]; ?>' data-acf-key="<?php echo $field_name . '_' . $row_count . '_grid_item_' . $grid_row_count . '_background_image'; ?>" />
		<?php endif; ?>
			<div class="grid-item__content">
		<?php
					if(get_sub_field('text')):
		?>
					<h2 class="grid-item__title delimiter acf-edit__field" data-acf-key="<?php echo $field_name . '_' . $row_count . '_grid_item_' . $grid_row_count . '_title'; ?>"><?php the_sub_field('title'); ?></h2>
					<h2 class="product-item__subtitle acf-edit__field" data-acf-key="<?php echo $field_name . '_' . $row_count . '_grid_item_' . $grid_row_count . '_subtitle'; ?>"><?php the_sub_field('subtitle'); ?></h2>
					<p class="grid-item__text acf-edit__field" data-acf-key="<?php echo $field_name . '_' . $row_count . '_grid_item_' . $grid_row_count . '_text'; ?>"><?php the_sub_field('text'); ?></p>
		<?php
					else:
		?>
					<h2 class="grid-item__title acf-edit__field" data-acf-key="<?php echo $field_name . '_' . $row_count . '_grid_item_' . $grid_row_count . '_title'; ?>"><?php the_sub_field('title'); ?></h2>
		<?php
					endif;
					if($grid_sizes[$grid_item_count][0] == '1' && $grid_sizes[$grid_item_count][1] == '1') {
						$grid_onebyone_count++;

						if($grid_onebyone_count % 2 == 0) {
							$grid_height_count += $grid_sizes[$grid_item_count][1];
						}
					} else {
						$grid_height_count += $grid_sizes[$grid_item_count][1];
					}

					echo '</div></a></div><!-- .grid-block__item -->';

					$grid_item_count++;

					if($grid_height_count == $grid_height_total/2) {
						echo '</div><!-- .grid-block__column --><div class="grid-block__column">';
					}
					$grid_row_count++;
				endwhile;
		?>
			</div><!-- last .grid-block__column -->
		<?php
			endif;
		?>
	</div>
</section>



<?php else: ?>
<section class="grid-block-section">
	<div class="section-content">
		<h2>You don't have the right amount of grid items.</h2>
	</div>
</section>
<?php endif; ?>
