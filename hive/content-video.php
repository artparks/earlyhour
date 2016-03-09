<?php
/**
 * The template for displaying the video post format on archives.
 * @package Hive
 */

//get the media objects from the content and bring up only the first one
$content = apply_filters( 'the_content', get_the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'hive_txtd' ) ) );
$media   = hive_get_media_embedded_in_content( $content );
if ( ! empty( $media ) ) {
	$content = str_replace( $media[0], '', $content );
} ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<a href="%s" class="entry-permalink" rel="bookmark"><h1 class="entry-title">', esc_url( get_permalink() ) ), '</h1></a>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( ! empty( $media ) ) { ?>
		<div class="entry-media">
			<?php echo apply_filters('embed_oembed_html', $media[0] ); ?>
		</div><!-- .entry-media -->
	<?php
	}

	if ( $content ) { ?>
		<div class="entry-content">
			<?php
			echo $content;

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'hive_txtd' ),
				'after'  => '</div>',
			) ); ?>
		</div><!-- .entry-content -->
	<?php }

	edit_post_link( __( 'Edit', 'hive_txtd' ), '<div class="edit-link">', '</div>' ); ?>

	<footer class="entry-footer">
		<div class="entry-meta">
			<?php hive_posted_on();

			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'hive_txtd' ) );
			if ( $categories_list && hive_categorized_blog() ) { ?>
				<span class="cat-links">
                        <?php echo $categories_list; ?>
                    </span>
			<?php } // End if categories ?>
		</div><!-- .entry-meta -->
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->