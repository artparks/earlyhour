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

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=528842543859676";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));</script>

<div id="page" class="hfeed site">

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'hive_txtd' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<div class="container">
			<div class="site-branding">
				<a href="<?php echo home_url() ?>">
					<img src="<?php echo TEMPLATE_DIR ?>/img/logo.svg" alt="the early hour logo" class="early-logo">
				</a>

				<div class="site-description">
					<span class="site-description-text"></span>
				</div>
			</div>

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<h5 class="screen-reader-text"><?php _e( 'Main navigation', 'hive_txtd' ); ?></h5>
				<div class="nav-wrap">

					<div class="early-sun">
						<img src="<?php echo TEMPLATE_DIR ?>/img/sun.svg" alt="rising sun" class="">
					</div>
					<?php
					$menu_args = array(
						'theme_location' => 'primary',
						'container'      => '',
						'menu_class'     => 'nav  nav--main',
						'fallback_cb' => false,
						'echo' => false,
					);
					$menu = wp_nav_menu( $menu_args );

					if( false !== $menu ) : ?>
						<button class="navigation__trigger">
							<i class="fa fa-bars"></i><span class="screen-reader-text"><?php _e( 'Menu', 'hive_txtd' ); ?></span>
						</button>
					<?php
						echo $menu;
					endif; ?>
				</div>
			</nav><!-- #site-navigation -->
		</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">

		<div class="container">