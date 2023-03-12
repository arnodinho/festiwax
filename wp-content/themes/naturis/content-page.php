<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * Functions hooked in to naturis_page action
	 *
	 * @see naturis_page_header          - 10
	 * @see naturis_page_content         - 20
	 *
	 */
	do_action( 'naturis_page' );
	?>
</article><!-- #post-## -->
