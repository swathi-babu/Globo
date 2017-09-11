<?php
/**
 * @package globo
 */

$value = $_POST['value'];
$post_id = $_POST['post_id'];

update_sub_field('field_54f4f38f9016b', $value, $post_id);

echo 'Value: ' . $value;
echo 'Post ID: ' . $post_id;
?>
<h1>This is the test.php page</h1>