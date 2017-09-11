<?php
/**
 * Get the color scheme from
 * flexible content modules and
 * decode
 *
 * @package globo
 */
?>

<?php
	$input_color = get_sub_field('color_scheme');
	$color = '';
	if( strpos(strtoLower($input_color), 'primary') !== false ) {
		$color = 'primary';
	} if( strpos(strtoLower($input_color), 'secondary') !== false ) {
		$color = 'secondary';
	} if( strpos(strtoLower($input_color), 'tertiary') !== false ) {
		$color = 'tertiary';
	} if( strpos(strtoLower($input_color), 'black') !== false ) {
		$color = 'dark';
	} if( strpos(strtoLower($input_color), 'white') !== false ) {
		$color = 'light';
	}
?>