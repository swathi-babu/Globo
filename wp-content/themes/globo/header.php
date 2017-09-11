<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <main>
 *
 * @package globo
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=false">
<?php wp_head(); ?>
<?php include_once('partials/ie-conditionals.php'); ?>
</head>

<?php get_template_part('partials/font-loader'); ?>

<span class="defs">
	<?php include_once('images/icons/compiled-icons.svg'); ?>
</span>

<body <?php body_class(); ?>>
	<?php get_template_part('partials/navigation'); ?>

	<header>

	</header>

	<main>