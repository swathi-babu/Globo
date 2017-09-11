<?php
/**
 * @package globo
 */

get_header(); ?>
<?php
	$location = strtolower(get_query_var( 'location' ));
	$department = get_query_var( 'department' );
?>

<header class="tax-job">
	<div class="segmented-controls ajax-link">
	<?php
		$department_list = array(
			'All',
			'Design',
			'Engineering',
			'Sales & Marketing',
		);

		foreach($department_list as $the_department) {
			if($the_department == 'All') {
				$arr_params = array('location' => $location);
				$selected = $department == '' ? true : false;
				if($selected) {
					echo '<a href="' . add_query_arg($arr_params, '') . '" class="selected">' . $the_department . '</a>';
				} else {
					echo '<a href="' . add_query_arg($arr_params, '') . '">' . $the_department . '</a>';
				};
			} else {
				$arr_params = array('location' => $location, 'department' => $the_department);
				$selected = $department == $the_department ? true : false;
				if($selected) {
					echo '<a href="' . add_query_arg($arr_params, '') . '" class="selected">' . $the_department . '</a>';
				} else {
					echo '<a href="' . add_query_arg($arr_params, '') . '">' . $the_department . '</a>';
				};
			}
		};
	?>
	</div>
	<select name="departments" id="departments">
	<?php
		foreach($department_list as $the_department) {
			echo '<option value="' . $the_department . '">' . $the_department . '</option>';
		};
	?>
	</select>
	<ul class="horizontal-picker ajax-link">
	<?php
		$locations_list = array(
			array('name' => 'San Francisco', 'loc' => 'san-francisco'),
			array('name' => 'Athens', 'loc' => 'Athens'),
			array('name' => 'London', 'loc' => 'London'),
		);

		foreach ($locations_list as $the_location) {
			if($department == '') {
				$arr_params = array('location' => $the_location['loc']);
			} else {
				$arr_params = array('location' => $the_location['loc'], 'department' => $department);
			}
			$selected = $location == $the_location['loc'] ? true : false;
			if($selected) {
				echo '<li class="horizontal-picker-item selected" id="' . $the_location['loc'] . '"><a href="' . add_query_arg($arr_params, '') . '"><h5><span>' . $the_location['name'] . '</span></h5></a></li>';
 			} else {
				echo '<li class="horizontal-picker-item" id="' . $the_location['loc'] . '"><a href="' . add_query_arg($arr_params, '') . '"><h5><span>' . $the_location['name'] . '</span></h5></a></li>';
 			}
		};
	?>
	</ul>
	<select name="locations" id="locations">
	<?php
		foreach($locations_list as $the_location) {
			echo '<option value="' . $the_location['loc'] . '">' . $the_location['name'] . '</option>';
		};
	?>
	</select>
	<a href="#" class="ghost-button filter">filter jobs</a>
</header>



<?php get_footer(); ?>
