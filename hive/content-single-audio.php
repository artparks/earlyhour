<?php
/**
 * The template for displaying single audio post format posts.
 *
 * @package Hive
 */

//get the media objects from the content and bring up only the first one
$content = apply_filters( 'the_content', get_the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'hive_txtd' ) ) );
$media   = hive_get_media_embedded_in_content( $content );
if ( ! empty( $media ) ) {
	$content = str_replace( $media[0], '', $content );
} ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/* translators: used between list items, there is a space after the comma */
	$category_list = get_the_category_list( __( ', ', 'hive_txtd' ) );

	/* translators: used between list items, there is a space after the comma */
	$tag_list = get_the_tag_list( '', __( ', ', 'hive_txtd' ) );

	if ( ! hive_categorized_blog() ) {
		// This blog only has 1 category so we just need to worry about tags in the meta text
		if ( '' != $tag_list ) {
			$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'hive_txtd' );
		} else {
			$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'hive_txtd' );
		}

	} else {
		// But this blog has loads of categories so we should probably display them here
		if ( '' != $tag_list ) {
			$meta_text = __( 'Posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'hive_txtd' );
		} else {
			$meta_text = __( 'Posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'hive_txtd' );
		}

	} // end check for categories on this blog
	?>
	<header class="entry-header">
		<div class="entry-meta">
			<?php hive_posted_on(); ?>
			<span class="entry-format">
				<a href="<?php echo esc_url( get_post_format_link( 'audio' ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'hive_txtd' ), get_post_format_string( 'audio' ) ) ); ?>">
					<?php echo get_post_format_string( 'audio' ); ?>
				</a>
			</span>
			<?php if ( $category_list && hive_categorized_blog() ) { ?>
				<span class="cat-links">
					<?php echo $category_list; ?>
				</span>
			<?php } // End if categories ?>
		</div><!-- .entry-meta -->

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( ! empty( $media ) ) : ?>
		<div class="entry-featured  entry-media">
			<?php printf( '%s', $media[0] ); ?>
		</div><!-- .entry-media -->
	<?php endif; ?>

	<div class="entry-content">
		<?php echo $content; ?>
	</div><!-- .entry-content -->

	<?php
	wp_link_pages( array(
		'before' => '<div class="page-links  pagination">',
		'after'  => '</div>',
		'next_or_number' => 'number',
		'nextpagelink'     => __( 'Next page', 'hive_txtd' ),
		'previouspagelink' => __( 'Previous page', 'hive_txtd' ),
		'pagelink' => '%',
		'echo' => 1,
	) );
	?>

	<footer class="entry-footer">
		<?php

		printf(
			$meta_text,
			$category_list,
			$tag_list,
			get_permalink()
		);

		edit_post_link( __( 'Edit', 'hive_txtd' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->