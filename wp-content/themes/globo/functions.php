<?php
/**
 * globo functions and definitions
 *
 * @package globo
 */

if ( ! function_exists( 'globo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function globo_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'globo', get_template_directory() . '/languages' );
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'mobile-for-you' => 'mobile-for-you',
		'solutions' => 'solutions',
		'products' => 'products',
		'pricing' => 'pricing',
		'working-with-globo' => 'working-with-globo',
		'misc-1' => 'misc-1',
		'misc-2' => 'misc-2',
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );
}
endif; // globo_setup
add_action( 'after_setup_theme', 'globo_setup' );

/**
 * Enqueue scripts and styles.
 */
function globo_scripts() {
	wp_enqueue_style( 'globo-style', get_stylesheet_uri() );
	wp_enqueue_script( 'globo-script', get_template_directory_uri() . "/scripts/4_organisms/global.min.js", array(), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'globo_scripts' );

function evaluate_device() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    if(strpos(strtolower($userAgent),'msie') !== false) {
    	return true;
    } else {
    	return false;
    }
}

/**
 * Change to google cdn jquery.
 */
function modify_jquery() {
	if (!is_admin() && !in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'))) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', false, '2.1.1');
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'modify_jquery');

/**
 * Change jQuery version for IE.
 */
function ie_jquery() {
	if (evaluate_device()) {
		// change jquery version:
		wp_deregister_script('jquery');
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', false, '1.11.1');
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'ie_jquery');

/**
 * Clean wrapping <p> tags and empty <p> and <br /> tags from WYSIWYG fields
 */
function clean_wysiwyg($field, $is_sub = false) {
	$content = $is_sub ? get_sub_field($field) : get_field($field);
	$content = force_balance_tags($content);
	$content = preg_replace( array(
		'#<p>\s*<(div|aside|section|article|header|footer|em|a)#',
		'#</(div|aside|section|article|header|footer|em|a)>\s*</p>#',
		'#</(div|aside|section|article|header|footer|em|a)>\s*<br ?/?>#',
		'#<(div|aside|section|article|header|footer|em|a)(.*?)>\s*</p>#',
		'#<p>\s*</(div|aside|section|article|header|footer|em|a)#',
	), array(
		'<$1',
		'</$1>',
		'</$1>',
		'<$1$2>',
		'</$1',
	), $content );

	$content =  preg_replace('#<p>(\s|&nbsp;)*+(<br\s*/*>)*(\s|&nbsp;)*</p>#i', '', $content);

	$content =  preg_replace('#<p></p>#i', '', $content);

	$content =  preg_replace('#<br\s*/*>#i', '', $content);

    return $content;
}

function text_block_rules($hook) {
    if ( 'post.php' != $hook ) {
        return;
    }

    wp_enqueue_script( 'test', get_template_directory_uri() . 'scripts/utilities/test.js' );
}
add_action( 'admin_enqueue_scripts', 'text_block_rules' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

class primary_menu_walker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$menu_class = 'submenu submenu-level-' . ($depth + 1);
		$output .= "\n$indent<ul class='" . $menu_class . "'>\n";
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = ' class="';

		/* Check for children */
		$children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
		if (!empty($children)) {
			$class_names .= 'has-sub';
		}

		$class_names .= ' submenu-item';

		if($depth > 0) {
			$class_names .= ' submenu-level-' . $depth . '__item';
		}

		// // Start of the List Item
		$output .= $indent . '<li' . $class_names . '"' . '>';

		// // Link Attributes
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		// // List Item Insides
		$item_output = $args->before;
		$item_prefix = '';
		$item_suffix = '';
		if($depth == 0) {
			$item_prefix .= '<a class="open-submenu" ' . $attributes . '><h3 class="primary-menu-item__title">';
			$item_suffix .= '</h3></a>';
		} elseif($depth == 1 && strpos($class_names, 'has-sub') !== false) {
			$item_prefix .= '<a class="submenu-link" ' . $attributes . '><span class="primary-submenu-item__title">';
			$item_suffix .= '</span></a>';
		} else {
			$item_prefix .= '<a class="submenu-link" ' . $attributes . '>';
			$item_suffix .= '</a>';
		}
		$item_output .= $item_prefix;
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= $item_suffix;
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/**
 * Returns true if page is the child of specified parent page
 */
function is_child($page_slug, $supplied_ID = false) {

	if( $supplied_ID ) {
		$other_post = get_post( $supplied_ID );

		$page = get_page_by_path($page_slug);
		$page_ID = $page->ID;

		if( is_page() && ($other_post->post_parent==$page_ID) ) {
			return true;
		} else {
			return false;
		}
	} else {
		global $post;

		$page = get_page_by_path($page_slug);
		$page_ID = $page->ID;

		if( is_page() && ($post->post_parent==$page_ID) ) {
			return true;
		} else {
			return false;
		}
	}
}

/**
 * Add page slug as a class to the body tag
 */
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

/**
 * Enqueue front-end editing scripts if user is logged in as admin
 * and has permission to edit this post
 *
 * TODO: Add WP NONCE
 */
if( is_user_logged_in() && current_user_can('publish_posts') && !is_admin() ) {
	wp_enqueue_script( 'acf_edit', get_template_directory_uri() . '/scripts/utilities/acfUpdate.js', array(), '1.0.0', true);
}

function evaluate_img_color($filename) {
	$luminance = get_avg_luminance($filename,10);

	// assume a medium gray is the threshold, #acacac or RGB(172, 172, 172)
	// this equates to a luminance of 170
	if ($luminance > 170) {
	    return "dark";
	} else {
	    return "light";
	}
}

// get average luminance, by sampling $num_samples times in both x,y directions
function get_avg_luminance($filename, $num_samples=10) {
    $img = imagecreatefromjpeg($filename);

    $width = imagesx($img);
    $height = imagesy($img);

    $x_step = intval($width/$num_samples);
    $y_step = intval($height/$num_samples);

    $total_lum = 0;

    $sample_no = 1;

    for ($x=0; $x<$width; $x+=$x_step) {
        for ($y=0; $y<$height; $y+=$y_step) {

            $rgb = imagecolorat($img, $x, $y);
            $r = ($rgb >> 16) & 0xFF;
            $g = ($rgb >> 8) & 0xFF;
            $b = $rgb & 0xFF;

            // choose a simple luminance formula from here
            // http://stackoverflow.com/questions/596216/formula-to-determine-brightness-of-rgb-color
            $lum = ($r+$r+$b+$g+$g+$g)/6;

            $total_lum += $lum;

            // debugging code
 //           echo "$sample_no - XY: $x,$y = $r, $g, $b = $lum<br />";
            $sample_no++;
        }
    }

    // work out the average
    $avg_lum  = $total_lum/$sample_no;

    return $avg_lum;
}