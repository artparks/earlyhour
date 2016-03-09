<?php
/**
 * The template for displaying the status post format on archives.
 * @package Hive
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="media  media--rev">

		<div class="media__img">
			<?php if ( hive_validate_gravatar( get_the_author_meta( 'email' ) ) ) { ?>
				<div class="entry-avatar">
					<?php echo get_avatar( get_the_author_meta( 'email' ) ); ?>
				</div><!-- .entry-avatar -->
			<?php } ?>
		</div>

		<div class="media__body">
			<?php
			// Just the excerpt for search pages
			if ( is_search() ) { ?>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
			<?php } else { ?>
				<div class="entry-content">
					<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'hive_txtd' ) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'hive_txtd' ),
						'after'  => '</div>',
					) ); ?>
				</div><!-- .entry-content -->
			<?php }
			echo get_the_author_link(); ?>
		</div>

	</div>

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