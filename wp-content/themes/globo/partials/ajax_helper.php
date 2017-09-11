<?php
/**
 * @package globo
 */
?>
<?php
// Our include
define('WP_USE_THEMES', false);
require_once('../../../../wp-load.php');
 
// Our variables
$location = (isset($_GET['query-location'])) ? $_GET['query-location'] : 0;
$type = (isset($_GET['query-type'])) ? $_GET['query-type'] : 0;

// our loop
$args = array(
	'post_type'	=> 'partners',
	'order'		=> 'ASC',
	'tax_query'	=> array(
		'relation'	=> 'AND',
		array(
			'taxonomy'	=> 'partner_type',
			'field'		=> 'slug',
			'terms'		=> $type,
		),
		array(
			'taxonomy'	=> 'partner_location',
			'field'		=> 'slug',
			'terms'		=> $location,
		),
	),
);

$partners = new WP_Query($args);
if( $partners->have_posts() ) {
	while( $partners->have_posts() ) {
		$partners->the_post();
		echo  '<div class="slide partner-slider__slide"><div class="slide__content">';
		$partner_logo = get_field('logo');
		$partner_logo_width = $partner_logo['width'];
		$partner_logo_height = $partner_logo['height'];
		$testimonial = get_field('testimonial', false, false);
		$website = get_field('website');
		if( $partner_logo) {
			$logo_size = $partner_logo_width > $partner_logo_height ? 'wide' : 'tall';
			echo '<div class="partner-slider__logo-wrap"><img src="' . $partner_logo['url'] . '" class="parter-slider__logo ' . $logo_size . '" alt="' . $partner_logo['alt'] . '" /></div>';
		}
		if ( $testimonial ) {
			echo '<p class="parter-slider__testimonial">' . $testimonial . '</p>';
		}
		if( $website ) {
			echo '<small class="partner-slider__link"><a href="' . $website . '">' . $website . '</a></small>';
		}
		echo '</div></div>';
	}
}
?>