<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after
 * @package Hive
 */ ?>
</div><!-- .container -->

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<div class="grid">
			<div class="grid__item  site-info">
				<small>&copy; Copyright <?php echo date('Y') ?> The Early Hour. All rights reserved.</small>
			</div><!-- .site-info -->

			<div class="grid__item  footer-navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => '',
						'menu_class'     => 'nav  nav--footer',
						'items_wrap'         => '<nav><h5 class="screen-reader-text">'.__( 'Footer navigation', 'hive_txtd' ).'</h5><ul id="%1$s" class="%2$s">%3$s</ul></nav>',
					)
				); ?>
			</div>
		</div>
	</div><!-- .site-footer .container -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php get_template_part( 'templates/toolbar' );
wp_footer();?>

</body>
</html>