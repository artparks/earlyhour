<?php
/**
 * The header for our theme.
 * Displays all of the <head> section and everything up till <div id="content">
 * @package Hive
 */
?><!DOCTYPE html>
<!--[if IE 9]>
<html class="ie9 lt-ie10" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<link href='http://fonts.googleapis.com/css?family=Fira+Sans:300,400' rel='stylesheet' type='text/css'>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=no">
	<link rel="shortcut icon" type="image/png" href="<?php echo TEMPLATE_DIR ?>/img/favicon.png" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

	<!--[if !IE]><!-->
	<script>
		if (/*@cc_on!@*/false) {
			document.documentElement.className += ' ie10';
		}
	</script>
	<!--<![endif]-->
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<div id="content" class="site-content">

		<div class="container">