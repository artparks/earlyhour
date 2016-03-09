<?php
/**
 * The template for displaying single status post format posts.
 * @package Hive
 */
?>
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

	} // end check for categories on this blog ?>
	<header class="entry-header">
		<div class="entry-meta">
			<?php hive_posted_on(); ?>
			<span class="entry-format">
				<a href="<?php echo esc_url( get_post_format_link( 'status' ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'hive_txtd' ), get_post_format_string( 'status' ) ) ); ?>">
					<?php echo get_post_format_string( 'status' ); ?>
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

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<?php
	wp_link_pages( array(
		'before'           => '<div class="page-links  pagination">',
		'after'            => '</div>',
		'next_or_number'   => 'number',
		'nextpagelink'     => __( 'Next page', 'hive_txtd' ),
		'previouspagelink' => __( 'Previous page', 'hive_txtd' ),
		'pagelink'         => '%',
		'echo'             => 1,
	) );

	if ( hive_validate_gravatar( get_the_author_meta( 'email' ) ) ): ?>
		<div class="entry-avatar">
			<?php echo get_avatar( get_the_author_meta( 'email' ) ); ?>
			<?php echo get_the_author_link(); ?>
		</div><!-- .entry-avatar -->
	<?php endif; ?>

	<footer class="entry-footer">
		<?php
		printf( $meta_text, $category_list, $tag_list, get_permalink() );

		edit_post_link( __( 'Edit', 'hive_txtd' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->