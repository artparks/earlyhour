<?php
/**
 * The template for displaying the aside post format on archives.
 * @package Hive
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'hive_txtd' ) );
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'hive_txtd' ),
			'after'  => '</div>',
		) ); ?>
	</div><!-- .entry-content -->

	<?php edit_post_link( __( 'Edit', 'hive_txtd' ), '<div class="edit-link">', '</div>' ); ?>

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