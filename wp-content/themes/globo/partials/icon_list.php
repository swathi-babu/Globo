<?php
/**
 * @package globo
 */
?><?php require('color-scheme.php'); ?>

<section class="<?php echo $color ?> icon-list-block">
	<div class="section-content">
		<h2 class="heavy"><?php the_sub_field('title'); ?></h2>
		<?php
			$count = count(get_sub_field('icon_list_item'));
			$class = '_' . $count . '-items ';
			if($count % 3 == 0 & $count % 4 !== 0) {
				$class .= 'factor-of-three';
			}
			if( have_rows('icon_list_item') ):
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
						if( !empty($icon) ): ?>
							<div class="icon-list__icon-container">
								<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" class="icon-list__icon <?php echo $icon_class; ?>" />
							</div>
					<?php endif; ?>
					<h5 class="icon-list__title"><?php the_sub_field('text'); ?></h5>

				</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>