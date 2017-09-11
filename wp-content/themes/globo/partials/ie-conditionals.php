<?php
/**
 * All IE conditional comments
 *
 * @package globo
 */
?>
<!--[if IE 6]>
<body <?php body_class("ie ie-lte-9 ie-6"); ?>>
<![endif]-->
<!--[if IE 7]>
<body <?php body_class("ie ie-lte-9 ie-7"); ?>>
<![endif]-->
<!--[if IE 8]>
<body <?php body_class("ie ie-lte-9 ie-8"); ?>>
<![endif]-->
<!--[if IE 9]>
<body <?php body_class("ie ie-lte-9 ie-9"); ?>>
<![endif]-->
<!--[if IE ]>
<body <?php body_class("ie"); ?>>
<script type="text/javascript">
	document.createElement('nav');
	document.createElement('aside');
	document.createElement('article');
	document.createElement('section');
	document.createElement('main');
	document.createElement('header');
	document.createElement('footer');
</script>
<style type="text/css">
	nav,
	aside,
	article,
	section,
	main,
	header,
	footer {
		display: block;
	}
</style>
<![endif]-->