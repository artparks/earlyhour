<?php
wp_deregister_script( 'hive-scripts' );
wp_enqueue_style( 'earlyhour-style', get_stylesheet_directory_uri() . '/style.css', array('hive-style') );
wp_enqueue_script( 'prod-js', get_stylesheet_directory_uri() . '/prod.js', array(/*'typekit-js',*/ 'jquery', 'masonry', 'hive-imagesloaded', 'hive-hoverintent', 'hive-velocity'), '1.0.1', true );

define( 'TEMPLATE_DIR',  get_stylesheet_directory_uri() );

add_theme_support( 'infinite-scroll', array(
	'container' => 'posts'
));

function adverts_widgets_init() {
	register_sidebar( array(
		'name'          => 'Adverts above related posts',
		'id'            => 'sidebar_adverts_above',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	));

	register_sidebar( array(
		'name'          => 'Adverts below related posts',
		'id'            => 'sidebar_adverts_below',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	));
}
add_action( 'widgets_init', 'adverts_widgets_init' );