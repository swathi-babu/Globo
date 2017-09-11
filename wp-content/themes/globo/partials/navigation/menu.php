<?php
/**
 * The main menu that appears
 * in the header and footer
 *
 * @package globo
 */
?>
<div class="primary-menu">
	<div class="section-content">
		<div class="primary-menu__column">
			<ul class="primary-menu__submenu submenu-mfy">
			<?php
				$ops = array(
					'theme_location'  	=> 'mobile-for-you',
					'menu'            	=> '',
					'container'       	=> false,
					'items_wrap'      	=> '%3$s',
					'walker'			=> new primary_menu_walker()
				);
				wp_nav_menu($ops);
			?>
			</ul>
			<ul class="primary-menu__submenu submenu-solutions">
			<?php
				$ops = array(
					'theme_location'  	=> 'solutions',
					'menu'            	=> '',
					'container'       	=> false,
					'items_wrap'      	=> '%3$s',
					'walker'			=> new primary_menu_walker()
				);
				wp_nav_menu($ops);
			?>
			</ul>
		</div><!-- .primary-menu__column -->
		<div class="primary-menu__column double-wide">
			<ul class="primary-menu__submenu submenu-products">
			<?php
				$ops = array(
					'theme_location'  	=> 'products',
					'menu'            	=> '',
					'container'       	=> false,
					'items_wrap'      	=> '%3$s',
					'walker'			=> new primary_menu_walker()
				);
				wp_nav_menu($ops);
			?>
			</ul>
			<ul class="primary-menu__submenu submenu-pricing">
			<?php
				$ops = array(
					'theme_location'  	=> 'pricing',
					'menu'            	=> '',
					'container'       	=> false,
					'items_wrap'      	=> '%3$s',
					'walker'			=> new primary_menu_walker()
				);
				wp_nav_menu($ops);
			?>
			</ul>
		</div><!-- .primary-menu__column -->
		<div class="primary-menu__column">
			<ul class="primary-menu__submenu submenu-wwg">
			<?php
				$ops = array(
					'theme_location'  	=> 'working-with-globo',
					'menu'            	=> '',
					'container'       	=> false,
					'items_wrap'      	=> '%3$s',
					'walker'			=> new primary_menu_walker()
				);
				wp_nav_menu($ops);
			?>
			</ul>
			<ul class="primary-menu__submenu submenu-misc1">
			<?php
				$ops = array(
					'theme_location'  	=> 'misc-1',
					'menu'            	=> '',
					'container'       	=> false,
					'items_wrap'      	=> '%3$s',
					'walker'			=> new primary_menu_walker()
				);
				wp_nav_menu($ops);
			?>
			</ul>
			<ul class="primary-menu__submenu submenu-misc2">
			<?php
				$ops = array(
					'theme_location'  	=> 'misc-2',
					'menu'            	=> '',
					'container'       	=> false,
					'items_wrap'      	=> '%3$s',
					'walker'			=> new primary_menu_walker()
				);
				wp_nav_menu($ops);
			?>
			</ul>
		</div><!-- .primary-menu__column -->
	</div><!-- .section-content -->
</div>