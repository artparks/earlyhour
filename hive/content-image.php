<?php
/**
 * The template for displaying the image post format on archives.
 * @package Hive
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="hover__handler">
		<aside class="entry-thumbnail">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'hive-masonry-image' );
			} else { // we need to search in the content for an image - maybe we find one
				$first_image = hive_get_post_format_first_image();
				if ( ! empty( $first_image ) ) {
					echo $first_image;
				}
			}

			get_template_part( 'templates/featured-hover' ); ?>
		</aside>
		<?php the_title( sprintf( '<a class="entry-permalink" href="%s" rel="bookmark"><h1 class="entry-title">', esc_url( get_permalink() ) ), '</h1></a>' ); ?>
	</div>

	<?php edit_post_link( __( 'Edit', 'hive_txtd' ), '<div class="edit-link">', '</div>' ); ?>

</article><!-- #post-## -->