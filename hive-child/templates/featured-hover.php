<?php
/**
 * The template for the featured image hover on archives.
 * @package Hive
 */

?>
<a class="hover" href="<?php the_permalink(); ?>">
	<span class="hover__bg"></span>

	<div class="flexbox">
		<div class="flexbox__item">
			<img src="<?php echo TEMPLATE_DIR ?>/img/sun.svg" class="hover__letter">
			<span class="hover__more">READ MORE</span>
		</div>
	</div>
</a>