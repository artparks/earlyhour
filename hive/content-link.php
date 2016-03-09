<?php
/**
 * The template for displaying the link post format on archives.
 * @package Hive
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) { ?>
		<aside class="entry-thumbnail">
			<a href="<?php echo esc_url( hive_get_post_format_link_url() ); ?>" title="<?php echo get_the_title(); ?>" rel="bookmark">
				<?php the_post_thumbnail( 'hive-masonry-image' ) ?>
				<div class="article__featured-image-meta">
					<div class="flexbox">
						<div class="flexbox__item">
							<i class="fa fa-link"></i>
						</div>
					</div>
				</div>
			</a>
		</aside>
	<?php } else { ?>
		<header class="entry-header">
			<?php the_title( sprintf( '<a href="%s" class="entry-permalink" rel="bookmark"><h1 class="entry-title">', esc_url( hive_get_post_format_link_url() ) ), '</h1></a>' ); ?>
		</header><!-- .entry-header -->
	<?php
	}

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