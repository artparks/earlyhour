<div id="secondary" class="sidebar  sidebar--main" role="complementary">

	<?php if( get_post_type() == "post" ) : ?>

	<?php $sidebarFields = get_fields(get_the_ID()); ?>

	<?php if ( is_active_sidebar( 'sidebar_adverts_above' ) ) : ?>
		<div class="primary-sidebar widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar_adverts_above' ); ?>
		</div>
	<?php endif; ?>

	<div class="related">
		<h2 class="related__header">Related Posts</h2>

		<?php foreach( $sidebarFields['related_posts'] as $item ) : setup_postdata($item); ?>
		<article id="post-<?php echo $item->ID ?>" class="related__entry">
			<div class="entry__wrap">

				<?php
				$categories_list = get_the_category_list( __( ', ', 'hive_txtd' ), '', $item->ID );
				if ( $categories_list && hive_categorized_blog() ) { ?>
					<span class="cat-links">
			            <?php echo $categories_list; ?>
			        </span>
				<?php } // End if categories ?>

				<div class="hover__handler">
					<header class="entry-header">
						<a href="<?php echo get_permalink($item->ID) ?>" class="entry-permalink" rel="bookmark">
							<h3 class="entry-title"><?php echo $item->post_title ?></h3>
						</a>
					</header><!-- .entry-header -->

					<?php if ( has_post_thumbnail($item->ID) ) { ?>
						<aside class="entry-thumbnail">
							<?php echo get_the_post_thumbnail( $item->ID ) ?>
						</aside>
					<?php } ?>
				</div>

				<div class="entry-content">
					<?php
					global $post;
					// Check the content for the more text
					the_excerpt($item->ID);

					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'hive_txtd' ),
						'after'  => '</div>',
					) ); ?>
				</div><!-- .entry-content -->

				<?php
				// Hide category and tag text for pages on Search
				if ( 'post' == get_post_type() ) { ?>
					<footer class="entry-footer">
						<div class="entry-meta">
							<?php hive_posted_on(); ?>
						</div><!-- .entry-meta -->
					</footer><!-- .entry-footer -->
				<?php } // End if 'post' == get_post_type() ?>

			</div>
		</article><!-- #post-## -->
		<?php endforeach; ?>

		<?php endif; ?>
	</div>

	<?php if ( is_active_sidebar( 'sidebar_adverts_below' ) ) : ?>
		<div class="primary-sidebar widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar_adverts_below' ); ?>
		</div>
	<?php endif; ?>

</div><!-- #secondary -->