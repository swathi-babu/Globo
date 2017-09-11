<?php
/*
Template Name: ACF Edit
*/
if( 'POST' == $_SERVER['REQUEST_METHOD']) {

	$data = $_POST['fields'];
	$files = $_POST['files'];
	$page_id = $_POST['id'];
	$keys = array_keys($data);
	$values = array_values($data);
	$product = array();
	$count = 0;

	// Push field values into cleaner array
	foreach ($data as $item) {
		$temp_array = array(
			'field' => $keys[$count],
			'value' => $values[$count],
		);

		array_push($product, $temp_array);
		$count++;
	}

	print_r($files);

	// foreach ($files as $file) {
		// require_once( ABSPATH . 'wp-admin/includes/image.php' );
		// require_once( ABSPATH . 'wp-admin/includes/file.php' );
		// require_once( ABSPATH . 'wp-admin/includes/media.php' );

		// $attachment_id = media_handle_upload( $files, $page_id );

		// if ( is_wp_error( $attachment_id ) ) {
		// 	$error_string = $attachment_id->get_error_message();
		// 	echo 'there was an error: ' . $error_string;
		// } else {
		// 	echo 'Image upload successful!';
		// }
	// }

	$product_length = count($product);
	for($i = 0; $i < $product_length; $i++) {
		update_post_meta($page_id, $product[$i]['field'], $product[$i]['value']);
	}

}

?>